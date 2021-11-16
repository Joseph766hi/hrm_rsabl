<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load Spout Library
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Salary extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('salary_model');
        $this->load->model('general_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        if($this->user_model->isNotLogin() || $this->session->userdata('user_logged')->role != 0) redirect(site_url('login'));

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
    }

	public function index()
	{
        //ketika button submit diklik
        if ($this->input->post('submit', TRUE) == 'upload') {
			// var_dump($this->input->post());die;
            $config['upload_path'] = './upload/'; //siapkan path untuk upload file
            $config['allowed_types']    = 'xlsx|xls'; //siapkan format file
            $config['file_name']        = 'salary' . time(); //rename file yang diupload
 
            // $this->load->library('upload', $config);
			$this->load->library('upload');
			$this->upload->initialize($config);
 
            if ($this->upload->do_upload('excel')) {
                //fetch data upload
                $file   = $this->upload->data();
 
                $reader = ReaderEntityFactory::createXLSXReader(); //buat xlsx reader
                $reader->open('upload/' . $file['file_name']); //open file xlsx yang baru saja diunggah
 
                //looping pembacaat sheet dalam file        
                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
 
                    //siapkan variabel array kosong untuk menampung variabel array data
                    $save   = array();
 
                    //looping pembacaan row dalam sheet
                    foreach ($sheet->getRowIterator() as $row) {
 
                        if ($numRow > 1) {
                            //ambil cell
                            $cells = $row->getCells();
                            // echo $cells[0];die;
                            $user_id = $this->employee_model->getByNik($cells[0]);
                            // echo $user_id->id;die;
                            $data = array(
                                'employee_id'              	=> $user_id->id,
                                'salary'     		=> $cells[1],
                                'allowance'            => $cells[2],
								'overtime'           => $cells[3],
                                'total'             => $cells[4],
                                'month'             => $cells[5],
                                'year'              => $cells[6]
                            );

                            // echo print_r($data);die;
 
                            //tambahkan array $data ke $save
                            array_push($save, $data);

                            // echo print_r($save);die;
                        }
 
                        $numRow++;
                    }
                    //simpan data ke database
                    $this->salary_model->simpan($save);
 
                    //tutup spout reader
                    $reader->close();
 
                    //hapus file yang sudah diupload
                    unlink('upload/' . $file['file_name']);
 
                    //tampilkan pesan success dan redirect ulang ke index controller import
                    $this->general_model->generatePesan("Salary was imported successfully","success");
                    redirect(site_url('salary'));
                }
            } else {
                $error = $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
				$this->general_model->generatePesan($error,"error");
                redirect(site_url('salary'));
				// var_dump($this->input->post());die;
            }
        }
        $salary = $this->salary_model;
        $data["month"]  = $this->month;
        $data['salary'] = [];

        if ($this->input->get()) {
            $get = $this->input->get();
            $data['salary'] = $salary->findByDate($get);
        }
        $data['list_karyawan'] = $this->employee_model->getAll();
        $data['month'] = $this->month;
      	$data['content'] = 'index';
      	$data['folder']	= 'salary';
      	$this->load->view('./layouts/app',$data);

    }

    public function add()
    {
        $salary = $this->salary_model;
        $employees = $this->employee_model;
        $validation = $this->form_validation;
        $validation->set_rules($salary->rules());

        if ($validation->run()) {
            $a = $salary->save();
            if ($a) {
                $this->general_model->generatePesan("Salary was added successfully","success");
                redirect(site_url('salary'));
            }else{
                $this->general_model->generatePesan("Data already exists","error");
                redirect(site_url('salary'));
            }
        }
        $data["month"]  = $this->month;
        $data['employees']   = $employees->getAll();
        $data['content'] = 'create';
		$data['folder']	= 'salary';
		$this->load->view('./layouts/app',$data);
    }
    
    public function edit($id = null)    
    {
        $salary = $this->salary_model;
        $employees = $this->employee_model;
        $validation = $this->form_validation;
        $validation->set_rules($salary->rules());

        if ($validation->run()) {
            $salary->update();
            // var_dump($id->id);die;
            $this->general_model->generatePesan("Salary was updated successfully","success");
            redirect(site_url('salary'));
        }
        $data["month"]  = $this->month;
        $data['salary'] = $this->salary_model->getById($id);
        // var_dump($data["salary"]);die;
        $data['employees']   = $employees->getAll();
        if(!$data['salary']) show_404();
        $data['content'] = 'edit';
		$data['folder']	= 'salary';
		$this->load->view('./layouts/app',$data);
    }

    public function delete($id = null)
    {
        if(!isset($id)) show_404();

        if ($this->salary_model->delete($id)) {
            redirect(site_url('salary'));
        }
    }

    public function view($id)
    {
        $data['salary'] = $this->esalary_model->getById($id);
        if(!$data['salary']) show_404();
        $data['content'] = 'view';
		$data['folder']	= 'salary';
		$this->load->view('./layouts/app',$data);
    }

    public function report()
    {
        $salary = $this->salary_model;
        $data["month"]  = $this->month;
        $data['salary'] = [];

        if ($this->input->get()) {
            $get = $this->input->get();
            $data['salary'] = $salary->findByDate($get);
        }
        // var_dump($data['salary']);die;
        $data['employees'] = $this->employee_model->getAll();
        $data['content']   = 'report';
        $data['folder']    = 'salary';
        $this->load->view('./layouts/app',$data);   
    }

    public function reportDetail($id)
    {
        if (!isset($id)) redirect('salary/report');

        $salary = $this->salary_model;
        $data["month"]  = $this->month;
        $data['salary'] = $salary->getById($id);
        if(!$data['salary']) show_404();
        $data['content'] = 'report_detail';
		$data['folder']	= 'salary';
        $this->load->view('./layouts/app',$data);
    }

    public function exportReport($id)
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
}
