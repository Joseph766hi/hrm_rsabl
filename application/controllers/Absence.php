<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load Spout Library
require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Carbon\Carbon;

class Absence extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
		$this->load->model('absence_model');
        $this->load->model('employee_model');
        $this->load->library('form_validation');    
        $this->load->model('user_model');    
		// $this->load->library('upload');
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
            $config['file_name']        = 'absence' . time(); //rename file yang diupload
 
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
							$date = str_replace('/', '-', $cells[3]);
							$tanggal = date('Y-m-d', strtotime($date));
                            // echo $tanggal;die;
 
                            $data = array(
                                'nik'              	=> $cells[0],
                                'masuk'     		=> $cells[1],
                                'keluar'            => $cells[2],
								'tanggal'           => $tanggal
                            );
 
                            //tambahkan array $data ke $save
                            array_push($save, $data);
                        }
 
                        $numRow++;
                    }
                    //simpan data ke database
                    $this->absence_model->simpan($save);
 
                    //tutup spout reader
                    $reader->close();
 
                    //hapus file yang sudah diupload
                    unlink('upload/' . $file['file_name']);
 
                    //tampilkan pesan success dan redirect ulang ke index controller import
                    $this->general_model->generatePesan("Absence was imported successfully","success");
                    redirect(site_url('absence'));
                }
            } else {
                $error = $this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
				$this->general_model->generatePesan($error,"error");
                redirect(site_url('absence'));
				// var_dump($this->input->post());die;
            }
        }
        $absence = $this->absence_model;
        $data['absence'] = [];

        if ($this->input->get()) {
            $get = $this->input->get();
            $data['absence'] = $absence->findByDate($get);
            // var_dump($data['paid_leave']);die;
            $data["default_from"] = $get["from"];
            $data["default_to"] = $get["to"];
        } else {
            $month = date("m");
            $year = date("Y");
            $last_day = date("t");
            $data["default_from"] = $year."-".$month."-01";
            $data["default_to"] = $year."-".$month."-".$last_day;

            $getVal = [
                'from'        => $data['default_from'],
                'to'          => $data['default_to'],
                'employee_id' => 'all_employee'
            ];
            $data['absence'] = $absence->findByDate($getVal);
        }
        // var_dump( $data['absence']);die;
        $data['employees']     = $this->employee_model->getAll();
        $data['list_karyawan'] = $this->employee_model->getAll();
        
      	$data['content'] = 'import';
      	$data['folder']	= 'absen';
      	$this->load->view('./layouts/app',$data);
    }

    public function store()
    {
        $save   = array();
        $post = $this->input->post();

        $check = $this->db->query("SELECT * FROM absence WHERE nik = '".$post['nik']."' AND tanggal = '".$post['tanggal']."'")->row();
        if ($check) {
            $this->general_model->generatePesan("Data already exists","error");
            redirect(base_url('absence'));
        }
        
        $data = array(
            'nik'              	=> $post["nik"],
            'masuk'     		=> $post["masuk"],
            'keluar'            => $post["keluar"],
            'tanggal'           => date('Y-m-d', strtotime($post["tanggal"]))
        );
        array_push($save, $data);
        $this->absence_model->simpan($save);
        $this->general_model->generatePesan("Attendance successfully created","success");
        redirect(base_url('absence'));
    }

    public function report()
    {
        $data['bulan'] = $this->month;
        if ($this->input->get()) {
            $get = $this->input->get();
            $month = $get['month'];
            $year = $get['year'];
        
        } else {
            $month = date("m");
            $year = date("Y");
        }
        // var_dump( $data['absence']);die;
        
        // echo $year;
        $data['employees']  = $this->db->query('SELECT
        a.*,
        e.`name` as position,
        f.`name` as division,
        (
        SELECT
            COUNT( id ) 
        FROM
            absence c 
        WHERE
            a.nik = c.nik 
            AND MONTH ( c.tanggal ) = "'.$month.'"
            AND YEAR ( c.tanggal ) = "'.$year.'"
        ) AS hadir
        
    FROM
        employees a
        JOIN absence d ON a.nik = d.nik 
        JOIN position e ON a.position_id = e.id
        JOIN division f ON a.division_id = f.id
    WHERE
        MONTH ( d.tanggal ) = "'.$month.'" 
        AND YEAR ( d.tanggal ) = "'.$year.'" GROUP BY a.nik ')->result();
        $hadir=0;
        $sakit=0;
        $cuti=0;
        $izin=0;

        $re =[];
        foreach ($data['employees'] as $key => $v) {
            // echo $value->name;die;
            $data['absen'] = $this->db->query('SELECT from_ as tgl, type FROM paid_leave b WHERE b.nik = "'.$v->nik.'" AND MONTH(from_) = '.$month.' AND YEAR(from_) = '.$year.'
            UNION
            SELECT to_ as tgl, type FROM paid_leave c WHERE c.nik = "'.$v->nik.'" AND MONTH(to_) = '.$month.' AND YEAR(to_) = '.$year.'
            UNION
            SELECT tanggal as tgl, type FROM absence d WHERE d.nik = "'.$v->nik.'" AND MONTH(tanggal) = '.$month.' AND YEAR(tanggal) = '.$year.'
            ORDER BY tgl ASC')->result();

            foreach ($data['absen'] as $key => $item) {
                if($item->type !== 'Hadir'){
                    $tgl[$item->type][] = $item->tgl;
                }
                $b[] = [
                    'tgl' => $item->tgl,
                    'type' => $item->type
                ];
            }
            $no = 0;
            // echo json_encode($tgl);
            if (isset($tgl)) {
                foreach ($tgl as $key => $value) {
                    $tgl1 = new DateTime($tgl[$key][0]);
                    $tgl2 = new DateTime($tgl[$key][1]);
                    $d = $tgl2->diff($tgl1)->days;
                    // echo $d;die;
                    $g = $value[0];
                    for ($i=1; $i <= $d ; $i++) { 
                        $t[] = [
                            'tgl' => date('Y-m-d', strtotime('+1 days', strtotime($g))),
                            'type' => $key
                        ];
    
                        $g = date('Y-m-d', strtotime('+1 days', strtotime($g)));
                    }
                }
                $a = array_merge($b,$t);
                $r= array_unique($a,SORT_REGULAR);
                foreach ($r as $key => $value1) {
                    if ($value1['type'] == 1 || $value1['type'] == 2) {
                        $cuti+=1;
                    }elseif ($value1['type'] == 3) {
                        $sakit+=1;
                    }elseif($value1['type'] !== 4) {
                        $izin+=1;
                    }
                }
                $re[$v->id] = [
                    'nik' => $v->nik,
                    'nama' => $v->name,
                    'posisi' => $v->position,
                    'divisi' => $v->division,
                    'hadir' => $v->hadir,
                    'sakit' => $sakit,
                    'cuti' => $cuti,
                    'izin' => $izin
                ];
            }else{
                $re[$v->id] = [
                    'nik' => $v->nik,
                    'nama' => $v->name,
                    'posisi' => $v->position,
                    'divisi' => $v->division,
                    'hadir' => $v->hadir,
                    'sakit' => 0,
                    'cuti' => 0,
                    'izin' => 0
                ];
            }
        }

        // echo print_r($re);die;
        $data['re']      = $re;
        $data['month']   = $month;
        $data['year']    = $year;
        $data['content'] = 'report';
        $data['folder']  = 'absen';
        $this->load->view('./layouts/app',$data);   
    }

    public function detail_report()
    {
        if ($this->input->get()) {
            $get = $this->input->get();
            $month = $get['month'];
            $year = $get['year'];
            $nik=$get['nik'];
            $last_day = date("t");
            $data["default_from"] = 
            $data["default_to"] = 

            $dateFrom = $year."-".$month."-01";
            $dateTo = $year."-".$month."-".$last_day;

            $data['user'] = $this->employee_model->getByNik($nik);

            $data['absen'] = $this->db->query('SELECT from_ as tgl, type FROM paid_leave b WHERE b.nik = "'.$nik.'" AND MONTH(from_) = '.$month.' AND YEAR(from_) = '.$year.'
            UNION
            SELECT to_ as tgl, type FROM paid_leave c WHERE c.nik = "'.$nik.'" AND MONTH(to_) = '.$month.' AND YEAR(to_) = '.$year.'
            UNION
            SELECT tanggal as tgl, type FROM absence d WHERE d.nik = "'.$nik.'" AND MONTH(tanggal) = '.$month.' AND YEAR(tanggal) = '.$year.'
            ORDER BY tgl ASC')->result();

            foreach ($data['absen'] as $key => $item) {
                if($item->type !== "Hadir"){
                    $tgl[$item->type][] = $item->tgl;
                }
                $b[] = [
                    'tgl' => $item->tgl,
                    'type' => $item->type
                ];
            }
            $no = 0;
            if (isset($tgl)) {
                foreach ($tgl as $key => $value) {
                    $tgl1 = new DateTime($tgl[$key][0]);
                    $tgl2 = new DateTime($tgl[$key][1]);
                    $d = $tgl2->diff($tgl1)->days;
                    // echo $d;die;
                    $g = $value[0];
                    for ($i=1; $i <= $d ; $i++) { 
                        $t[] = [
                            'tgl' => date('Y-m-d', strtotime('+1 days', strtotime($g))),
                            'type' => $key
                        ];
    
                        $g = date('Y-m-d', strtotime('+1 days', strtotime($g)));
                    }
                }
                $a = array_merge($b,$t);
                $data['absensi'] = array_unique($a, SORT_REGULAR);
            }else{
                $data['absensi'] = $b;
            }
            // echo json_encode($a);die;
            // echo json_encode($a[1]['cause']);die;
            // for ($i=0; $i < count($a) ; $i++) { 
            //     $data['absensi'] = [
            //         'tgl' => $a[$i]['tgl'],
            //         'cause' => $a[$i]['cause'],
            //     ];
            // }
            $hadir=0;
            $sakit=0;
            $cuti=0;
            $izin=0;

            foreach($data['absensi'] as $key => $item)
            {
                if ($item['type'] == 1) {
                    $cuti+=1;
                } elseif($item['type'] == 2 ) {
                    $cuti+=1;
                }elseif($item['type'] == 3 ) {
                    $sakit+=1;
                }elseif($item['type'] == 4 ) {
                    $izin+=1;
                }else{
                    $hadir+=1;
                }
            }
            $data['d'] = [$hadir,$sakit,$cuti,$izin];
            $data['content'] = 'detail_report';
            $data['folder']	= 'absen';
            $this->load->view('./layouts/app',$data); 
        }
    }
}
