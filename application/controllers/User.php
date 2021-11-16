<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';
 
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave_model');
        $this->load->model('religion_model');
        $this->load->model('absence_model');
        $this->load->model('employee_model');
        $this->load->model('general_model');
        $this->load->model('bank_model');
        $this->load->model('salary_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->library('pdf');
        $this->kuota_cuti = 10;
        $this->load->helper(array('url','download'));
        if($this->user_model->isNotLogin()) redirect(site_url('login'));

		$this->month = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ];

        $this->cuti_lahir = 60;
    }

    public function profile()
    {
        $employee   = $this->employee_model;
        $user       = $this->user_model;
        $validation = $this->form_validation;
        $rule = [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required']
        ];
        $validation->set_rules($rule);

        $d = $employee->getById($this->session->userdata('user_logged')->user_id);
        $filename = $d->photo;
        $err = array();
        // var_dump($data['userlogged']->user_id);die;

        if ($validation->run()) {
            // echo "A";die;
            // echo print_r($this->input->post());die;
            
            if ($this->input->post('picture') !== '') {
				// echo "A";die;
                $config['upload_path'] = './upload/images'; //siapkan path untuk upload file
                $config['allowed_types']    = 'png|jpg|jpeg'; //siapkan format file
                $config['file_name']        = 'profile' . time(); //rename file yang diupload
    
                // $this->load->library('upload', $config);
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('picture')) {
                    //fetch data upload
                    $file   = $this->upload->data();
                    $filename = $file['file_name'];
                }else {
                    // $error = $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
                    // $this->general_model->generatePesan($error,"error");
                    // redirect(site_url('user/profile'));
                    $filename = $filename;
                }
                $u = $user->update();
                $e = $employee->updateProfile($this->session->userdata('user_logged')->user_id,$filename);
                if($e['st'] == 400 && !$u){
                    $err['username'] = "Username already exists";
                    $error = array_merge($err,$e['ar']);
                    $msg = implode(", ",$error);
                    $this->general_model->generatePesan($msg,"error");
                    redirect(site_url('user/profile'));
                }elseif (!$u) {
                    $err['username'] = "Username already exists";
                    $this->general_model->generatePesan($err['username'],"error");
                    redirect(site_url('user/profile'));
                }elseif ($e['st'] == 400) {
                    $msg = implode(", ",$e['ar']);
                    $this->general_model->generatePesan($msg,"error");
                    redirect(site_url('user/profile'));
                }
                $this->general_model->generatePesan("Profile was updated successfully","success");
                redirect(site_url('user/profile'));
            }else {
                $u = $user->update();
                $e = $employee->updateProfile($this->session->userdata('user_logged')->user_id,$filename);
                // $id = $this->session->userdata('user_logged')->user_id;
                if($e['st'] == 400 && !$u){
                    $err['username'] = "Username already exists";
                    $error = array_merge($err,$e['ar']);
                    $msg = implode(", ",$error);
                    // echo "A";die;
                    $this->general_model->generatePesan($msg,"error");
                    redirect(site_url('user/profile'));
                }elseif (!$u) {
                    $err['username'] = "Username already exists";
                    $this->general_model->generatePesan($err['username'],"error");
                    // echo "b";die;
                    redirect(site_url('user/profile'));
                }elseif ($e['st'] == 400) {
                    $msg = implode(", ",$e['ar']);
                    $this->general_model->generatePesan($msg,"error");
                    // echo "d";die;
                    redirect(site_url('user/profile'));
                }
                $this->general_model->generatePesan("Profile was updated successfully","success");
                redirect(site_url('user/profile'));
            }
            
        }
        // echo $this->session->userdata('user_logged')->user_id;die;

        $data['userlogged'] = $employee->getById($this->session->userdata('user_logged')->user_id);
        $data['religion']   = $this->religion_model->getAll();
        $data['bank']       = $this->bank_model->getAll();
        $data['content']    = 'profile';
        $data['folder']     = 'user';
        $this->load->view('./layouts/app',$data);
    }

    public function paid_leave()
    {
        if($this->session->userdata('user_logged')->role != 1) redirect(site_url('login'));
        $employee = $this->employee_model;
        $data['userlogged'] = $employee->getById($this->session->userdata('user_logged')->user_id);
        
        $validation = $this->form_validation;
        $validation->set_rules($this->paidleave_model->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $tahun = date('Y');
            $type = $post['type'];
            $list_cuti_tahunan = $this->paidleave_model->get_per_tahun($post["nik"], $tahun, $type);
            $kuota_digunakan = 0;
            foreach ($list_cuti_tahunan as $cuti) {
                $date1=strtotime($cuti->from_);
                $date2=strtotime($cuti->to_);
                $datediff = $date2 - $date1;
                $kuota_digunakan = abs(round($datediff / (60 * 60 * 24)));
            }
            if ($type == "1") {
                $sisa_kuota = $this->cuti_lahir - $kuota_digunakan;
            }else {
                $sisa_kuota = $this->kuota_cuti - $kuota_digunakan;
            }

            $date1=strtotime($post["from_"]);
            $date2=strtotime($post["to_"]);
            $datediff = $date2 - $date1;
            $cuti_sekarang = abs(round($datediff / (60 * 60 * 24)));

            $sisa_kuota_hasil = $sisa_kuota - $cuti_sekarang;
            if($sisa_kuota_hasil < 0) {
                $this->general_model->generatePesan("Could not request ".$cuti_sekarang." days paid leave. You only have ".$sisa_kuota." days quota left.","failed");
                redirect("/user/paid_leave");
            }

            if ($post['file'] !== '') {

                $config['upload_path'] = './upload/proof'; //siapkan path untuk upload file
                $config['allowed_types']    = 'png|jpg|jpeg|pdf'; //siapkan format file
                $config['file_name']        = 'proof_' . $post['nik'] . time(); //rename file yang diupload
    
                // $this->load->library('upload', $config);
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('file')) {
                    //fetch data upload
                    $file   = $this->upload->data();
                    $filename = $file['file_name'];
                }else {
                    $error = $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
                    $this->general_model->generatePesan($error,"error");
                    redirect(site_url('user/paid_leave'));
                    // $filename = $filename;
                }
            }
            $this->paidleave_model->save($filename);
            $this->general_model->generatePesan("Paid leave was requested successfully","success");
            redirect(site_url('user/paid_leave'));
        }
        $whereIn = [1,2];
        $data['paid_leave'] = $this->paidleave_model->getAsEmployee($data['userlogged']->nik,$whereIn);
        // print(json_encode($data['paid_leave'])); die;
		$data['content'] = 'paid_leave';
		$data['folder']	= 'user';
		$this->load->view('./layouts/app',$data);
    }

    public function report_absence()
    {
        if($this->session->userdata('user_logged')->role != 1) redirect(site_url('login'));
        $employee = $this->employee_model;;
        $data['userlogged'] = $employee->getById($this->session->userdata('user_logged')->user_id);
        $absence = $this->absence_model;
        $data['absence'] = [];

        if ($this->input->get()) {
            $get = $this->input->get();
            $data['absence'] = $absence->findByDate($get);
            // var_dump($data['absence']);die;
        }
        // var_dump( $data['absence']);die;
        $data['content'] = 'report_absence';
        $data['folder']	= 'user';
        $this->load->view('./layouts/app',$data); 
    }

    public function exportReport()
    {
        //ambil data
        $dat = $this->input->get();
        $employee = $this->employee_model->getById($dat['id']);
        $get    = $this->absence_model->findByDate($dat);
 
        //validasi jumlah data
        if (count($get) > 0) {
            $writer = WriterEntityFactory::createXLSXWriter();
 
            $writer->openToBrowser("absence".$dat['from']."-".$dat['to'].".xlsx");
            $title = [
                WriterEntityFactory::createCell('Absen Periode '.$dat['from'].'-'.$dat['to']),
            ];
            $title = WriterEntityFactory::createRow($title);
            $writer->addRow($title);

            $br = [
                WriterEntityFactory::createCell(''),
                WriterEntityFactory::createCell(' '),
            ];
            $br = WriterEntityFactory::createRow($br);
            $writer->addRow($br);


            $nik = [
                WriterEntityFactory::createCell('NIK'),
                WriterEntityFactory::createCell($employee->nik),
            ];
            $nik = WriterEntityFactory::createRow($nik);
            $writer->addRow($nik);
            $name = [
                WriterEntityFactory::createCell('Name'),
                WriterEntityFactory::createCell($employee->employee),
            ];
            $name = WriterEntityFactory::createRow($name);
            $writer->addRow($name);
            $position = [
                WriterEntityFactory::createCell('Position'),
                WriterEntityFactory::createCell($employee->position),
            ];
            $position = WriterEntityFactory::createRow($position);
            $writer->addRow($position);
            $br = [
                WriterEntityFactory::createCell(''),
                WriterEntityFactory::createCell(' '),
            ];
            $br = WriterEntityFactory::createRow($br);
            $writer->addRow($br);
            //silahkan sobat sesuaikan dengan data yang ingin sobat tampilkan
            $header = [
                WriterEntityFactory::createCell('No'),
                WriterEntityFactory::createCell('Tanggal'),
                WriterEntityFactory::createCell('Jam Masuk'),
                WriterEntityFactory::createCell('Jam Keluar')
            ];
            /** Tambah row satu kali untuk header */
            $singleRow = WriterEntityFactory::createRow($header);
            $writer->addRow($singleRow); //tambah row untuk header data
 
            $data   = array(); //siapkan variabel array untuk menampung data
            $no     = 1;
 
            //looping pembacaan data
            foreach ($get as $key) {
                //masukkan data dari database ke variabel array
                //silahkan sobat sesuaikan dengan nama field pada tabel database
                $anggota    = array(
                    WriterEntityFactory::createCell($no++),
                    WriterEntityFactory::createCell($key->tanggal),
                    WriterEntityFactory::createCell($key->masuk),
                    WriterEntityFactory::createCell($key->keluar)
                );
 
                array_push($data, WriterEntityFactory::createRow($anggota)); //masukkan variabel array anggota ke variabel array data
            }
 
            $writer->addRows($data); // tambahkan row untuk data anggota
 
            $writer->close(); //tutup spout writer
        } else {
            echo "Data tidak ditemukan";
        }
    }
    
	public function salary(){
		$id = $this->session->userdata('user_logged')->id;
		// echo $id;die;
		$data['salary'] = $this->db->query("SELECT * FROM salary WHERE employee_id = '".$id."' ORDER BY month DESC, year DESC ")->result();
		$data["month"]  = $this->month;
		$data['content'] = 'salary';
        $data['folder']	= 'user';
        $this->load->view('./layouts/app',$data); 
	}

    public function salaryDetail($id)
    {
        if (!isset($id)) redirect('salary/report');

        $salary = $this->salary_model;
        $data["month"]  = $this->month;
        $data['salary'] = $salary->getById($id);
        if(!$data['salary']) show_404();
        $data['content'] = 'salary_detail';
		$data['folder']	= 'user';
        $this->load->view('./layouts/app',$data);
    }

    public function exportSalary($id)
    {
        $salary = $this->salary_model;
        $salary = $salary->getById($id);
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Rumah Sakit Advent',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        foreach($this->month as $key =>$m):
            if ( $key+1 == $salary->month) {
                $pdf->Cell(190,7,'Slip Gaji Karyawan Periode '.$m,'B',1,'C');
            }
        endforeach;
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(20,6,'NIK',0,0);
        $pdf->Cell(2,6,':',0,0);
        $pdf->Cell(85,6,$salary->nik,0,1);
        $pdf->Cell(20,6,'Nama',0,0);
        $pdf->Cell(2,6,':',0,0);
        $pdf->Cell(85,6,$salary->nama,0,1);
        $pdf->Cell(20,6,'Jabatan',0,0);
        $pdf->Cell(2,6,':',0,0);
        $pdf->Cell(85,6,$salary->position,0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,7,'Penghasilan',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50,6,'Gaji Pokok',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(85,6,"Rp.".number_format($salary->salary,2),0,1);
        $pdf->Cell(50,6,'Total Lembur',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(85,6,"Rp.".number_format($salary->overtime,2),0,1);
        $pdf->Cell(50,6,'Total Tunjangan',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(85,6,"Rp.".number_format($salary->allowance,2),0,1);
        $pdf->Cell(50,6,'Total',0,0);
        $pdf->Cell(5,6,':',0,0);
        $pdf->Cell(85,6,"Rp.".number_format($salary->total,2),0,1);
        $pdf->Output();
    }

    public function permit_application()
    {
        if($this->session->userdata('user_logged')->role != 1) redirect(site_url('login'));
        $employee = $this->employee_model;
        $data['userlogged'] = $employee->getById($this->session->userdata('user_logged')->user_id);
        
        $validation = $this->form_validation;
        $validation->set_rules($this->paidleave_model->rules());

        if ($validation->run()) {
            $post = $this->input->post();

            if ($post['file'] !== '') {

                $config['upload_path'] = './upload/proof'; //siapkan path untuk upload file
                $config['allowed_types']    = 'png|jpg|jpeg|pdf'; //siapkan format file
                $config['file_name']        = 'proof_' . $post['nik'] . time(); //rename file yang diupload
    
                // $this->load->library('upload', $config);
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('file')) {
                    //fetch data upload
                    $file   = $this->upload->data();
                    $filename = $file['file_name'];
                }else {
                    $error = $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
                    $this->general_model->generatePesan($error,"error");
                    redirect(site_url('user/permit_application'));
                    // $filename = $filename;
                }
            }

            $this->paidleave_model->save($filename);
            $this->general_model->generatePesan("Permit was requested successfully","success");
            redirect(site_url('user/permit_application'));
        }
        $whereIn = [3,4];
        $data['permit_application'] = $this->paidleave_model->getAsEmployee($data['userlogged']->nik,$whereIn);
        // print(json_encode($data['paid_leave'])); die;
		$data['content'] = 'permit_application';
		$data['folder']	= 'user';
		$this->load->view('./layouts/app',$data);
    }
}
