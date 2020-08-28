<?php

class dt_jadwal extends CI_Controller{

	public function index($id=null)
	{
		if ($id== null) {
			$data['dt_jadwal']=null;
		} else {
			if ($id == "edd") {
				$data['dt_jadwal']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','due_date ASC')->result();
			} else if ($id == "spt"){
				$data['dt_jadwal']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','waktu ASC')->result();
			}
			// $data['dt_jadwal']	= $this->jadwal_model-> tampil_data('dt_jadwal')->result();
		}
		$data['id'] = $id;
		// var_dump($data);die;
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_jadwal',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_jadwal()
	{
		$data ['dt_jadwal']	=$this->jadwal_model->tampil_data('dt_jadwal')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_jadwal_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_jadwal_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_jadwal();
		} else {
			$no_spk				=$this->input->post('no_spk');
			$tgl_spk			=$this->input->post('tgl_spk');
			$tgl_kirim			=$this->input->post('tgl_kirim');
			$id_pesanan			=$this->input->post('id_pesanan');
			$jumlah				=$this->input->post('jumlah');

			$data = array (
				'no_spk'		=> $no_spk,
				'tgl_spk'		=> $tgl_spk,
				'tgl_kirim'		=> $tgl_kirim,
				'id_pesanan'	=> $id_pesanan,
				'jumlah'		=> $jumlah,
			);

			$this->jadwal_model->insert_data($data,'dt_jadwal');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Jadwal Berhasil Ditambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/dt_jadwal');
		}
	}

	public function dt_jadwal_tampil()
	{

		$data['dt_jadwal']	= $this->jadwal_model-> tampil_data('dt_jadwal')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_jadwal_tampil',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function dt_jadwal_tampil_ppic()
	{
		// $data['dt_jadwal']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan')->result();
		$data['dt_jadwal']	= $this->jadwal_model-> tampil_data_join('dt_jadwal','dt_pesanan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_ppic');
		$this->load->view('administrator/dt_jadwal_tampil',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('no_spk','no_spk','required',[
			'required' => 'No. SPK harus diisi.'
		]);
		$this->form_validation->set_rules('tgl_spk','tgl_spk','required',[
			'required' => 'Tanggal SPK harus diisi.'
		]);
		$this->form_validation->set_rules('tgl_kirim','tgl_kirim','required',[
			'required' => 'Tanggal kirim harus diisi.'
		]);
		$this->form_validation->set_rules('id_pesanan','id_pesanan','required',[
			'required' => 'id_pesanan harus diisi.'
		]);
		$this->form_validation->set_rules('jumlah','jumlah','required',[
			'required' => 'Jumlah harus diisi.'
		]);
	}

	public function update($id)
	{
		$where = array('id_jadwal' => $id);
		$data['dt_jadwal'] = $this->jadwal_model->edit_data($where, 'dt_jadwal')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_jadwal_update', $data);
		$this->load->view('templates_administrator/footer');
	}


	public function update_aksi()
	{
		$id 			 = $this->input->post('id_jadwal');
		$no_spk 		 = $this->input->post('no_spk');
		$tgl_spk 		 = $this->input->post('tgl_spk');
		$tgl_kirim 		 = $this->input->post('tgl_kirim');
		$id_pesanan 	  = $this->input->post('id_pesanan');
		$jumlah 		 = $this->input->post('jumlah');

		$data = array(
			'no_spk' 		=> $no_spk,
			'tgl_spk'		=> $tgl_spk,
			'tgl_kirim'		=> $tgl_kirim,
			'id_pesanan'	=> $id_pesanan,
			'jumlah'		=> $jumlah,
		);
		
		$where = array(
			'id_jadwal' => $id
		);
		$this->jadwal_model->update_data($where, $data, 'dt_jadwal');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Jadwal Berhasil Diupdate!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_jadwal');
	}

	public function delete($id)
	{
		$where = array('id_jadwal' => $id);
		$this->jadwal_model->hapus_data($where, 'dt_jadwal');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data Jadwal Berhasil Dihapus!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_jadwal');
	}

	function print($id){
		$pdf = new FPDF('p','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
		// mencetak string 
		$pdf->Cell(190,7,'PT . CCCXXXXX',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'DAFTAR PENJADWALAN',0,1,'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'No SPK',1,0,'C');
		$pdf->Cell(30,6,'Tanggal SPK',1,0,'C');
		$pdf->Cell(30,6,'Tanggal Kirim',1,0,'C');
		$pdf->Cell(85,6,'Nama Produk',1,0,'C');
		$pdf->Cell(25,6,'Jumlah',1,1,'C');
		$pdf->SetFont('Arial','',10);
		if ($id == "edd") {
			$data	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','due_date ASC')->result();
		} else if ($id == "spt"){
			$data	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','waktu ASC')->result();
		}

		$no=1;
		foreach ($data as $row){
			$pdf->Cell(20,6,$no++,1,0,'C');
			$pdf->Cell(30,6,date('Y-m-d'),1,0,'C');
			$pdf->Cell(30,6,$row->tgl_kirim,1,0,'C');
			$pdf->Cell(85,6,$row->produk,1,0,'C');
			$pdf->Cell(25,6,$row->jumlah,1,1,'C'); 
		}
		$pdf->Output();
}
}