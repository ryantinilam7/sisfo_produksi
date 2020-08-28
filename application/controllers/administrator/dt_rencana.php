<?php

class dt_rencana extends CI_Controller{

	public function index()
	{

		$data['dt_rencana']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan')->result();
		$data['dt_rencana_edd']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','due_date ASC')->result();
		$data['dt_rencana_spt']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','waktu ASC')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_rencana',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_rencana()
	{
		$data['dt_pesanan_diterima'] = $this->rencana_model->tampil_pesanan('dt_pesanan','dt_rencana')->result();
		$data ['dt_rencana']	=$this->rencana_model->tampil_data('dt_rencana')->result();
		// var_dump($data);die;
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_rencana_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_rencana_aksi()
	{
		var_dump($_POST);die;
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_rencana();
		} else {
			$rencana	=$this->rencana_model->tampil_data('dt_rencana')->result();
			
			$id_pesanan			=$this->input->post('id_pesanan');
			$waktu				=$this->input->post('waktu');
			$aliran_waktu		=$this->input->post('aliran_waktu');
			$due_date			=$this->input->post('due_date');
			$keterlambatan		=$this->input->post('keterlambatan');
			$data = array (
				'id_pesanan'		=> $id_pesanan,
				'waktu'				=> $waktu,
				'aliran_waktu'		=> $aliran_waktu,
				'due_date'			=> $due_date,
				'keterlambatan'		=> $keterlambatan,
			);

			$this->rencana_model->insert_data($data,'dt_rencana');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Rencana Produksi Berhasil Ditambahkan!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
			redirect('administrator/dt_rencana');
		}
	}

		public function dt_rencana_tampil()
	{

		
		$data['dt_rencana_edd']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','due_date ASC')->result();
		$data['dt_rencana_spt']	= $this->rencana_model-> tampil_data_join('dt_rencana','dt_pesanan','waktu ASC')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_rencana_tampil',$data);
		$this->load->view('templates_administrator/footer');
	}


	public function _rules()
	{
		$this->form_validation->set_rules('id_pesanan','id_pesanan','required',[
			'required' => 'Id Pesanan harus diisi.'
		]);
		$this->form_validation->set_rules('waktu','waktu','required',[
			'required' => 'Waktu harus diisi.'
		]);
		$this->form_validation->set_rules('aliran_waktu','aliran_waktu','required',[
			'required' => 'Aliran waktu harus diisi.'
		]);
		$this->form_validation->set_rules('due_date','due_date','required',[
			'required' => 'Due date harus diisi.'
		]);
		$this->form_validation->set_rules('keterlambatan','keterlambatan','required',[
			'required' => 'Keterlambatan harus diisi.'
		]);
	}

	public function update($id)
	{
		
		$where = array('id_rencana' => $id);
		$data['dt_rencana'] = $this->rencana_model->edit_data($where, 'dt_rencana','dt_pesanan')->result();
		// var_dump($data);die;
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_rencana_update', $data);
		$this->load->view('templates_administrator/footer');
	}


	public function update_aksi()
	{
		// var_dump($_POST);die;
		$id			=$this->input->post('dt_rencana');
		$waktu				=$this->input->post('waktu');
		$aliran_waktu		=$this->input->post('aliran_waktu');
		$due_date			=$this->input->post('due_date');
		$keterlambatan		=$this->input->post('keterlambatan');

		$data = array (
				'waktu'				=> $waktu,
				'aliran_waktu'		=> $aliran_waktu,
				'due_date'			=> $due_date,
				'keterlambatan'		=> $keterlambatan,
		);
		
		$where = array(
			'id_rencana' => $id
		);
		$this->rencana_model->update_data($where, $data, 'dt_rencana');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Rencana Produksi Berhasil Diupdate!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_rencana');
	}

	public function delete($id)
	{
		$where = array('id_rencana' => $id);
		$this->pesanan_model->hapus_data($where, 'dt_rencana');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data Rencana Produksi Berhasil Dihapus!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_rencana');
	}
}