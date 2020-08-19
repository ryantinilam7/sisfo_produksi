<?php

class dt_hasil extends CI_Controller{

	public function index()
	{

		$data['dt_hasil']	= $this->hasil_model-> tampil_data('dt_hasil')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dt_hasil',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_hasil()
	{
		$data ['dt_hasil']	=$this->hasil_model->tampil_data('dt_hasil')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dt_hasil_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_hasil_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_hasil();
		} else {
			$id_hasil			=$this->input->post('id_hasil');
			$id_pesanan			=$this->input->post('id_posenan');
			$no_spk				=$this->input->post('no_spk');
			$tgl_selesai		=$this->input->post('tgl_selesai');
			$reject				=$this->input->post('reject');

			$data = array (
				'id_hasil'		=> $id_hasil,
				'id_pesanan'		=> $id_pesanan,
				'no_spk'		=> $no_spk,
				'tgl_selesai'	=> $tgl_selesai,
				'reject'		=> $reject,
			);

			$this->hasil_model->insert_data($data,'dt_hasil');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Hasil Produksi Berhasil Ditambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/dt_hasil');
		}
	}

	public function dt_hasil_tampil()
	{

		$data['dt_hasil']	= $this->hasil_model-> tampil_data('dt_hasil')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_hasil_tampil',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function dt_hasil_tampil_ppic()
	{

		$data['dt_hasil']	= $this->hasil_model-> tampil_data('dt_hasil')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_ppic');
		$this->load->view('administrator/dt_hasil_tampil',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_pesanan','id_pesanan','required',[
			'required' => 'Id pesanan harus diisi.'
		]);
		$this->form_validation->set_rules('no_spk','no_spk','required',[
			'required' => 'Nomor SPK harus diisi.'
		]);
		$this->form_validation->set_rules('tgl_selesai','tgl_selesai','required',[
			'required' => 'Tanggal selesai harus diisi.'
		]);
		$this->form_validation->set_rules('reject','reject','required',[
			'required' => 'Jumlah reject harus diisi.'
		]);
	}

	public function update($id)
	{
		$where = array('id_hasil' => $id);
		$data['dt_hasil'] = $this->hasil_model->edit_data($where, 'dt_hasil')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dt_hasil_update', $data);
		$this->load->view('templates_administrator/footer');
	}


	public function update_aksi()
	{
		$id_hasil 		 = $this->input->post('id_hasil');
		$id_pesanan 	 = $this->input->post('id_pesanan');
		$no_spk 		 = $this->input->post('no_spk');
		$tgl_selesai 	 = $this->input->post('tgl_selesai');
		$reject 		 = $this->input->post('reject');

		$data = array(
			'id_pesanan' 		=> $id_pesanan,
			'no_spk'			=> $no_spk,
			'tgl_selesai'		=> $tgl_selesai,
			'reject'			=> $reject,
		
		$where = array(
			'id_hasil' => $id
		);
		$this->hasil_model->update_data($where, $data, 'dt_hasil');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Hasil Produksi Berhasil Diupdate!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_hasil');
	}

	public function delete($id)
	{
		$where = array('id_hasil' => $id);
		$this->hasil_model->hapus_data($where, 'dt_hasil');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data Hasil Produksi Berhasil Dihapus!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_hasil');
	}
}