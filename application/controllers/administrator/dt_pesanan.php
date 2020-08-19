<?php

class dt_pesanan extends CI_Controller
{

	public function index()
	{

		$data['dt_pesanan']	= $this->pesanan_model->tampil_data('dt_pesanan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dt_pesanan', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_pesanan()
	{
		$data['dt_pesanan']	= $this->pesanan_model->tampil_data('dt_pesanan')->result();
		$data['time']		= time();
		$data['month']		= date('m');
		$waktu			= time();
		$ai				= $this->db->get('dt_pesanan')->num_rows();
		$data['aii'] = str_pad((int)$ai + 1, 4, 0, STR_PAD_LEFT);
		$data['po']		= $waktu . $ai + 1;
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dt_pesanan_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_pesanan_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_pesanan();
		} else {
			$tgl_pesan			= $this->input->post('tgl_pesan');
			$tgl_kirim			= $this->input->post('tgl_kirim');
			$nama_perusahaan	= $this->input->post('nama_perusahaan');
			$produk				= $this->input->post('produk');
			$keterangan			= $this->input->post('keterangan');
			$jumlah				= $this->input->post('jumlah');
			$no_po				= $this->input->post('no_po');

			$data = array(
				'tgl_pesan'			=> $tgl_pesan,
				'tgl_kirim'			=> $tgl_kirim,
				'nama_perusahaan'	=> $nama_perusahaan,
				'produk'			=> $produk,
				'keterangan'		=> $keterangan,
				'jumlah'		=> $jumlah,
				'no_po'				=> $no_po,
			);

			$this->pesanan_model->insert_data($data, 'dt_pesanan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Pesanan Berhasil Ditambahkan!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('administrator/dt_pesanan');
		}
	}

	public function dt_pesanan_tampil()
	{

		$data['dt_pesanan']	= $this->pesanan_model->tampil_data('dt_pesanan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar_mproduksi');
		$this->load->view('administrator/dt_pesanan_tampil', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tgl_pesan', 'tgl_pesan', 'required', [
			'required' => 'Tanggal Pesanan harus diisi.'
		]);
		$this->form_validation->set_rules('tgl_kirim', 'tgl_kirim', 'required', [
			'required' => 'Tanggal Kirim harus diisi.'
		]);
		$this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'required', [
			'required' => 'Nama Perusahaan harus diisi.'
		]);
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
			'required' => 'Jumlah harus diisi.'
		]);
		$this->form_validation->set_rules('produk', 'produk', 'required', [
			'required' => 'Produk harus diisi.'
		]);
	}

	public function update($id)
	{
		$where = array('id_pesanan' => $id);
		$data['dt_pesanan'] = $this->pesanan_model->edit_data($where, 'dt_pesanan')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dt_pesanan_update', $data);
		$this->load->view('templates_administrator/footer');
	}


	public function update_aksi()
	{
		$id 			 = $this->input->post('id_pesanan');
		$tgl_pesan 		 = $this->input->post('tgl_pesan');
		$tgl_kirim 		 = $this->input->post('tgl_kirim');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$produk 		 = $this->input->post('produk');
		$keterangan 	 = $this->input->post('keterangan');
		$jumlah 	 	 = $this->input->post('jumlah');
		$no_po 			 = $this->input->post('no_po');

		$data = array(
			'tgl_pesan' 		=> $tgl_pesan,
			'tgl_kirim'			=> $tgl_kirim,
			'nama_perusahaan'	=> $nama_perusahaan,
			'produk'			=> $produk,
			'keterangan'		=> $keterangan,
			'jumlah'			=> $jumlah,
			'no_po'				=> $no_po
		);

		// print_r($data);
		// die;

		$where = array(
			'id_pesanan' => $id
		);
		$this->pesanan_model->update_data($id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Pesanan Berhasil Diupdate!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_pesanan');
	}

	public function delete($id)
	{
		$where = array('id_pesanan' => $id);
		$this->pesanan_model->hapus_data($where, 'dt_pesanan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Data Pesanan Berhasil Dihapus!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('administrator/dt_pesanan');
	}
}
