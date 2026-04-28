<?php
$session = \Config\Services::session();
if (empty($session->get('username_calon_peserta_didik'))) {
	$session->setFlashdata('sukses', 'Ooops... Anda belum login');
	return redirect()->to(base_url('signin'));
}

// gabungkan semua bagian file
echo view('admin/layout/head');

require_once('header.php');
require_once('menu.php');

if ($content) {
	echo view($content);
}

echo view('admin/layout/footer');
