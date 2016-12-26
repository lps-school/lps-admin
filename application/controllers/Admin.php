<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('upload');
		$this->load->model('crud_model');
		//$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		error_reporting(0);
		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		$this->load->view('edit_page');
	}

	/*Edit Page Content*/
	public function edit_content($param)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($param === null) {
			redirect('admin', 'refresh');
		} else {
			$query                = $this->db->query("SELECT page_content FROM content WHERE page_name = '$param'");
			$data['page_content'] = $query->row();
			$data['page_name']    = $param;
			$this->load->view('edit_content', $data);
		}
	}

	/* Insert new page content*/
	public function insert_content($page_name)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$content = $this->input->post('editor-full'); //exit;

		$data = [
			'page_content' => $content
		];
		$this->db->where('page_name', $page_name);
		$this->db->update('content', $data);
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin', 'refresh');
	}

	/*Show blog in table view*/
	public function manage_blog($param)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($param === null) {
			redirect('admin', 'refresh');
		}
		$query                      = $this->db->get($param);
		$data['blog_content']       = $query->result_array();
		$data['blog_category_name'] = $param;
		$this->load->view('manage_blog', $data);
	}

	/*Add blog*/
	public function add_new_blog()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$this->load->view('add_new_blog');
	}

	/*Insert new Blog*/
	public function insert_blogs()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$created_at = date('y-m-d H:i:s');
		if ($_FILES['userfile']['name'] == '') {
			$data['blog_title']   = $this->input->post('blog_title');
			$data['blog_content'] = $this->input->post('editor-full');
			$data['blog_status']  = 'Active';
			$data['created_at']   = $created_at;
			$blog_category        = $this->input->post('blog_category');
			$this->db->insert($blog_category, $data);
		} else {
			$date           = date("d-m-Y");
			$img_name       = basename($_FILES['userfile']['name']);
			$extension      = explode('.', $img_name);
			$ext            = $extension[1];
			$Image_New_Name = uniqid() . "_" . $date . '_blog' . '.' . $ext;
			$target_dir     = "assets/uploads/blogs/" . $Image_New_Name;

			$data['blog_title']   = $this->input->post('blog_title');
			$data['blog_content'] = $this->input->post('editor-full');
			$data['blog_image']   = $Image_New_Name;
			$data['blog_status']  = 'Active';
			$data['created_at']   = $created_at;
			$blog_category        = $this->input->post('blog_category');
			$this->db->insert($blog_category, $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);
		}

		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_blog', 'refresh');
	}

	/*Delete Blog using Ajax*/
	public function ajax_delete_blog()
	{
		$id                 = $this->input->post('id');
		$blog_category_name = $this->input->post('blog_category_name');
		//$filename = $this->input->post('blog_image');
		//echo $id." ". $blog_category_name;
		//$this->db->delete($blog_category_name, array('id' => $id));
		$this->db->where('blog_id', $id);
		$this->db->delete($blog_category_name);
		//unlink(base_url()."assets/uploads/blogs/".$filename);
		/* $query = $this->db->query("SELECT blog_image FROM '$blog_category_name' WHERE blog_id  = '$id'");
		 $blog_img = $query->row();
		 foreach($blog_img as $row)
				$row;
			 unlink(base_url()."assets/uploads/blogs/".$row['blog_image']);*/
		/*$query = "SELECT blog_image FROM '$blog_category_name' WHERE blog_id  = '$id'";
		$result = mysql_query($query);
		$row=mysqli_fetch_array($result);*/
		//if(mysql_num_rows($row > 0))
		/*echo $filename = $row['blog_image'];
		 if(file_exists($filename)){
			 unlink(base_url()."assets/uploads/blogs/".$filename);
		 }else{
			 echo "error";
		 }*/
	}

	/*Change Status of blog using Ajax*/
	public function ajax_active_inactive()
	{
		$string             = $this->input->post('string');
		$id                 = $this->input->post('id');
		$blog_category_name = $this->input->post('blog_category_name');
		//echo $string . " " . $blog_category_name . " " . $id;

		$data = [
			'blog_status' => $string
		];

		$this->db->where('blog_id', $id);
		$this->db->update($blog_category_name, $data);
	}

	/*Edit Blog*/
	public function edit_blog($blog_category_name, $blog_id)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($blog_category_name && $blog_id == null) {
			redirect('admin', 'refresh');
		}
		$query                = $this->db->query("SELECT * FROM $blog_category_name WHERE blog_id = '$blog_id'");
		$data['page_content'] = $query->row();
		$data['blog_name']    = $blog_category_name;
		$this->load->view('edit_blog', $data);
	}

	/*Update Blog*/
	public function update_blog()
	{

		if ($_FILES['userfile']['name'] == '') {
			$blog_title    = $this->input->post('blog_title');
			$blog_content  = $this->input->post('editor-full');
			$data          = [
				'blog_title'   => $blog_title,
				'blog_content' => $blog_content
			];
			$blog_category = $this->input->post('blog_category');
			$blog_id       = $this->input->post('blog_id');
			$this->db->where('blog_id', $blog_id);
			$this->db->update($blog_category, $data);
		} else {
			$date           = date('y-m-d');
			$img_name       = basename($_FILES['userfile']['name']);
			$extension      = explode('.', $img_name);
			$ext            = $extension[1];
			$Image_New_Name = uniqid() . "_" . $date . '_blog' . '.' . $ext;
			$target_dir     = "assets/uploads/blogs/" . $Image_New_Name;

			$data['blog_title']   = $this->input->post('blog_title');
			$data['blog_content'] = $this->input->post('editor-full');
			$data['blog_image']   = $Image_New_Name;
			$blog_category        = $this->input->post('blog_category');
			$blog_id              = $this->input->post('blog_id');
			$this->db->where('blog_id', $blog_id);
			$this->db->update($blog_category, $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);
		}
		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_blog', 'refresh');
	}

	/*Show Home Page Slider*/
	public function slider_upload()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		$query           = $this->db->query("SELECT slider_image FROM slider");
		$data['sliders'] = $query->result_array();
		$this->load->view('slider_upload', $data);
	}

	/* Update Home Page Slider*/
	public function slider_update()
	{
		if ($_FILES['slider1']['name'] != '') {
			$img_name             = basename($_FILES['slider1']['name']);
			$extension            = explode('.', $img_name);
			$ext                  = $extension[1];
			$Image_New_Name       = 'lps_slider_1' . '.' . $ext;
			$data['slider_image'] = $Image_New_Name;
			$this->db->where('slider_name', 'slider1');
			$this->db->update('slider', $data);
			$target_dir = "assets/uploads/slider/" . $Image_New_Name;
			move_uploaded_file($_FILES['slider1']['tmp_name'], $target_dir);
		} elseif ($_FILES['slider2']['name'] != '') {
			$img_name             = basename($_FILES['slider2']['name']);
			$extension            = explode('.', $img_name);
			$ext                  = $extension[1];
			$Image_New_Name       = 'lps_slider_2' . '.' . $ext;
			$data['slider_image'] = $Image_New_Name;
			$this->db->where('slider_name', 'slider2');
			$this->db->update('slider', $data);
			$target_dir = "assets/uploads/slider/" . $Image_New_Name;
			move_uploaded_file($_FILES['slider2']['tmp_name'], $target_dir);
		} elseif ($_FILES['slider3']['name'] != '') {
			$img_name             = basename($_FILES['slider3']['name']);
			$extension            = explode('.', $img_name);
			$ext                  = $extension[1];
			$Image_New_Name       = 'lps_slider_3' . '.' . $ext;
			$data['slider_image'] = $Image_New_Name;
			$this->db->where('slider_name', 'slider3');
			$this->db->update('slider', $data);
			$target_dir = "assets/uploads/slider/" . $Image_New_Name;
			move_uploaded_file($_FILES['slider3']['tmp_name'], $target_dir);
		} elseif ($_FILES['slider4']['name'] != '') {
			$img_name             = basename($_FILES['slider4']['name']);
			$extension            = explode('.', $img_name);
			$ext                  = $extension[1];
			$Image_New_Name       = 'lps_slider_4' . '.' . $ext;
			$data['slider_image'] = $Image_New_Name;
			$this->db->where('slider_name', 'slider4');
			$this->db->update('slider', $data);
			$target_dir = "assets/uploads/slider/" . $Image_New_Name;
			move_uploaded_file($_FILES['slider4']['tmp_name'], $target_dir);
		} elseif ($_FILES['slider5']['name'] != '') {
			$img_name             = basename($_FILES['slider5']['name']);
			$extension            = explode('.', $img_name);
			$ext                  = $extension[1];
			$Image_New_Name       = 'lps_slider_5' . '.' . $ext;
			$data['slider_image'] = $Image_New_Name;
			$this->db->where('slider_name', 'slider5');
			$this->db->update('slider', $data);
			$target_dir = "assets/uploads/slider/" . $Image_New_Name;
			move_uploaded_file($_FILES['slider5']['tmp_name'], $target_dir);
		}


		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/slider_upload', 'refresh');
	}

	/*Add News and Events*/
	public function add_news_events()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		$this->load->view('add_news_events');
	}

	/*Insert news and events*/
	public function insert_news_events()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$created_at = date('y-m-d H:i:s');
		if ($_FILES['userfile']['name'] == '') {
			$data['news_title']   = $this->input->post('news_title');
			$data['news_content'] = $this->input->post('editor-full');
			$data['news_status']  = 'Active';
			$data['created_at']   = $created_at;
			$this->db->insert('news_events', $data);
		} else {
			$date           = date('y-m-d');
			$img_name       = basename($_FILES['userfile']['name']);
			$extension      = explode('.', $img_name);
			$ext            = $extension[1];
			$Image_New_Name = uniqid() . "_" . $date . '_news_events' . '.' . $ext;
			$target_dir     = "assets/uploads/news_events/" . $Image_New_Name;

			$data['news_title']   = $this->input->post('news_title');
			$data['news_content'] = $this->input->post('editor-full');
			$data['news_image']   = $Image_New_Name;
			$data['news_status']  = 'Active';
			$data['created_at']   = $created_at;

			$this->db->insert('news_events', $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);
		}

		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_news_events', 'refresh');
	}

	/*Show news and events in table view*/
	public function manage_news_events()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$query                = $this->db->get('news_events');
		$data['news_content'] = $query->result_array();
		//$data['blog_category_name'] = $param;
		$this->load->view('manage_news_events', $data);
	}

	/*Set Status of News*/
	public function news_ajax_active_inactive()
	{
		$string = $this->input->post('string');
		$id     = $this->input->post('id');

		//echo $string . " " . $id;

		$data = [
			'news_status' => $string
		];

		$this->db->where('news_id', $id);
		$this->db->update('news_events', $data);
	}

	/* Delete news using Ajax*/
	public function ajax_delete_news()
	{
		$id = $this->input->post('id');
		$this->db->where('news_id', $id);
		$this->db->delete('news_events');
		//unlink(base_url()."assets/uploads/blogs/".$filename);
	}

	/* Edit News Details*/
	public function edit_news_events($news_id)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($news_id == null) {
			redirect('admin', 'refresh');
		}
		$query                = $this->db->query("SELECT * FROM news_events WHERE news_id = '$news_id'");
		$data['news_content'] = $query->row();
		$this->load->view('edit_news_events', $data);
	}

	/* Update news and Events*/
	public function update_news_events()
	{

		if ($_FILES['userfile']['name'] == '') {
			$news_title   = $this->input->post('news_title');
			$news_content = $this->input->post('editor-full');
			$data         = [
				'news_title'   => $news_title,
				'news_content' => $news_content,
			];
			$news_id      = $this->input->post('news_id');
			$this->db->where('news_id', $news_id);
			$this->db->update('news_events', $data);
		} else {
			$date           = date('y-m-d');
			$img_name       = basename($_FILES['userfile']['name']);
			$extension      = explode('.', $img_name);
			$ext            = $extension[1];
			$Image_New_Name = uniqid() . "_" . $date . '_news' . '.' . $ext;
			$target_dir     = "assets/uploads/news_events/" . $Image_New_Name;

			$data['news_title']   = $this->input->post('news_title');
			$data['news_content'] = $this->input->post('editor-full');
			$data['news_image']   = $Image_New_Name;

			$news_id = $this->input->post('news_id');
			$this->db->where('news_id', $news_id);
			$this->db->update('news_events', $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);
		}
		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_news_events', 'refresh');
	}

	/*Upload Result*/
	public function result_upload()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$this->load->view('result_upload');
	}

	/* Update Results*/
	public function result_update()
	{
		if ($_FILES['result_class_12']['name'] != '') {
			$img_name            = basename($_FILES['result_class_12']['name']);
			$extension           = explode('.', $img_name);
			$ext                 = $extension[1];
			$Image_New_Name      = 'result_class_12_' . '.' . $ext;
			$data['result_file'] = $Image_New_Name;
			$this->db->where('result_name', 'result_class_12');
			$this->db->update('results', $data);
			$target_dir = "assets/uploads/results/" . $Image_New_Name;
			move_uploaded_file($_FILES['result_class_12']['tmp_name'], $target_dir);
		} elseif ($_FILES['subject_topper']['name'] != '') {
			$img_name            = basename($_FILES['subject_topper']['name']);
			$extension           = explode('.', $img_name);
			$ext                 = $extension[1];
			$Image_New_Name      = 'subject_topper' . '.' . $ext;
			$data['result_file'] = $Image_New_Name;
			$this->db->where('result_name', 'subject_topper');
			$this->db->update('results', $data);
			$target_dir = "assets/uploads/results/" . $Image_New_Name;
			move_uploaded_file($_FILES['subject_topper']['tmp_name'], $target_dir);
		} elseif ($_FILES['subject_wise_distinction']['name'] != '') {
			$img_name            = basename($_FILES['subject_wise_distinction']['name']);
			$extension           = explode('.', $img_name);
			$ext                 = $extension[1];
			$Image_New_Name      = 'subject_wise_distinction' . '.' . $ext;
			$data['result_file'] = $Image_New_Name;
			$this->db->where('result_name', 'subject_wise_distinction');
			$this->db->update('results', $data);
			$target_dir = "assets/uploads/results/" . $Image_New_Name;
			move_uploaded_file($_FILES['subject_wise_distinction']['tmp_name'], $target_dir);
		}


		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin', 'refresh');
	}

	/*Uplaod new photo in Gallery*/
	public function gallery_upload()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$this->load->view('gallery_upload');
	}

	/*Insert New Image in Gallery*/
	public function gallery_insert()
	{
		$date           = date('y-m-d');
		$created_at     = date('y-m-d H:i:s');
		$img_name       = basename($_FILES['userfile']['name']);
		$extension      = explode('.', $img_name);
		$ext            = $extension[1];
		$Image_New_Name = uniqid() . "_" . $date . '_gallery' . '.' . $ext;
		$target_dir     = "assets/uploads/gallery/" . $Image_New_Name;

		$data['gallery_title'] = $this->input->post('gallery_title');
		$data['gallery_image'] = $Image_New_Name;
		$data['status']        = 'Active';
		$data['created_at']    = $created_at;
		$this->db->insert('gallery', $data);
		move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);

		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_gallery', 'refresh');
	}

	/*Show Gallery and Title table view*/
	public function manage_gallery()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$query                   = $this->db->get('gallery');
		$data['gallery_content'] = $query->result_array();
		//$data['blog_category_name'] = $param;
		$this->load->view('manage_gallery', $data);
	}

	/*Set Status of Gallery*/
	public function gallery_ajax_active_inactive()
	{
		$string = $this->input->post('string');
		$id     = $this->input->post('id');

		//echo $string . " " . $id;

		$data = [
			'status' => $string
		];

		$this->db->where('gallery_id', $id);
		$this->db->update('gallery', $data);
	}

	/* Delete Gallery using Ajax*/
	public function ajax_delete_gallery()
	{
		$id = $this->input->post('id');
		$this->db->where('gallery_id', $id);
		$this->db->delete('gallery');
		//unlink(base_url()."assets/uploads/blogs/".$filename);
	}

	/* Edit Gallery Details*/
	public function edit_gallery($gallery_id)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($gallery_id == null) {
			redirect('admin', 'refresh');
		}
		$query                   = $this->db->query("SELECT * FROM gallery WHERE gallery_id = '$gallery_id'");
		$data['gallery_content'] = $query->row();
		$this->load->view('edit_gallery', $data);
	}

	/* Update Gallery */
	public function update_gallery()
	{

		if ($_FILES['userfile']['name'] == '') {
			$gallery_title = $this->input->post('gallery_title');

			$data       = [
				'gallery_title' => $gallery_title
			];
			$gallery_id = $this->input->post('gallery_id');
			$this->db->where('gallery_id', $gallery_id);
			$this->db->update('gallery', $data);
		} else {
			$date           = date('y-m-d');
			$img_name       = basename($_FILES['userfile']['name']);
			$extension      = explode('.', $img_name);
			$ext            = $extension[1];
			$Image_New_Name = uniqid() . "_" . $date . '_gallery' . '.' . $ext;
			$target_dir     = "assets/uploads/gallery/" . $Image_New_Name;

			$data['gallery_title'] = $this->input->post('gallery_title');
			$data['gallery_image'] = $Image_New_Name;

			$gallery_id = $this->input->post('gallery_id');
			$this->db->where('gallery_id', $gallery_id);
			$this->db->update('gallery', $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);
		}
		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_gallery', 'refresh');
	}

	/*Add Notice*/
	public function add_notice()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		$this->load->view('add_notice');
	}

	/*Insert Notice*/
	public function insert_notice()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$created_at         = date('y-m-d H:i:s');
		$data['title']      = $this->input->post('notice_title');
		$data['notice']     = $this->input->post('editor-full');
		$data['status']     = 'Active';
		$data['created_at'] = $created_at;
		$this->db->insert('noticeboard', $data);
		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_notice', 'refresh');
	}

	public function manage_notice()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$query                  = $this->db->get('noticeboard');
		$data['notice_content'] = $query->result_array();
		//$data['blog_category_name'] = $param;
		$this->load->view('manage_notice', $data);
	}

	/*Set Status of Notice*/
	public function notice_ajax_active_inactive()
	{
		$string = $this->input->post('string');
		$id     = $this->input->post('id');

		//echo $string . " " . $id;

		$data = [
			'status' => $string
		];

		$this->db->where('id', $id);
		$this->db->update('noticeboard', $data);
	}

	/* Delete Notice using Ajax*/
	public function ajax_delete_notice()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('noticeboard');
		//unlink(base_url()."assets/uploads/blogs/".$filename);
	}

	/* Edit Notice Details*/
	public function edit_notice($notice_id)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($notice_id == null) {
			redirect('admin', 'refresh');
		}
		$query                  = $this->db->query("SELECT * FROM noticeboard WHERE id = '$notice_id'");
		$data['notice_content'] = $query->row();
		$this->load->view('edit_notice', $data);
	}

	/* Update Notice */
	public function update_notice()
	{
		$notice_title = $this->input->post('notice_title');
		$notice       = $this->input->post('editor-full');

		$data      = [
			'title'  => $notice_title,
			'notice' => $notice
		];
		$notice_id = $this->input->post('notice_id');
		$this->db->where('id', $notice_id);
		$this->db->update('noticeboard', $data);

		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_notice', 'refresh');
	}

	/*Show Home Page Slider*/
	public function calendar_upload()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		$query                  = $this->db->query("SELECT image FROM calendar_image");
		$data['calendar_image'] = $query->result_array();
		$this->load->view('calendar_upload', $data);
	}

	/* Update Home Page Slider*/
	public function calendar_update()
	{
		if ($_FILES['userfile']['name'] != '') {
			$img_name           = basename($_FILES['userfile']['name']);
			$extension          = explode('.', $img_name);
			$ext                = $extension[1];
			$Image_New_Name     = 'monthly_calendar' . '.' . $ext;
			$data['image']      = $Image_New_Name;
			$data['created_at'] = $created_at = date('y-m-d H:i:s');
			$this->db->where('id', '1');
			$this->db->update('calendar_image', $data);
			$target_dir = "assets/uploads/calendar/" . $Image_New_Name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);

			$this->crud_model->clear_cache();
			$this->session->set_flashdata('update_success', 'Updated Sucessfully');
			redirect('admin/calendar_upload', 'refresh');
		} else {
			$this->session->set_flashdata('update_filed', 'Updated Failed');
			redirect('admin/calendar_upload', 'refresh');
		}
	}
/*===========================Link Start ======================================================*/
	/*Create new Link*/
	public function add_new_link()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$this->load->view('add_new_link');
	}

	/*Insert New Image for Link*/
	public function link_insert()
	{
		$date           = date('y-m-d');
		$created_at     = date('y-m-d H:i:s');
		$img_name       = basename($_FILES['userfile']['name']);
		$extension      = explode('.', $img_name);
		$ext            = $extension[1];
		$Image_New_Name = uniqid() . "_" . $date . '_link' . '.' . $ext;


		$data['link_title'] = $this->input->post('link_title');
		$data['link_image'] = $Image_New_Name;
		$data['link']       = base_url().'assets/uploads/links/'.$Image_New_Name;
		$data['status']     = 'Active';
		$data['created_at'] = $created_at;
		$this->db->insert('links', $data);
		$target_dir     = "assets/uploads/links/" . $Image_New_Name;
		move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);

		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_links', 'refresh');
	}

	/* Update Links */
	public function update_link()
	{

		if ($_FILES['userfile']['name'] == '') {
			$link_title = $this->input->post('link_title');

			$data       = [
				'link_title' => $link_title
			];
			$link_id = $this->input->post('link_id');
			$this->db->where('id', $link_id);
			$this->db->update('links', $data);
		} else {
			$date           = date('y-m-d');
			$img_name       = basename($_FILES['userfile']['name']);
			$extension      = explode('.', $img_name);
			$ext            = $extension[1];
			$Image_New_Name = uniqid() . "_" . $date . '_link' . '.' . $ext;

			$data['link_title'] = $this->input->post('link_title');
			$data['link_image'] = $Image_New_Name;
			$data['link']       = base_url().'assets/uploads/links/'.$Image_New_Name;

			$link_id = $this->input->post('link_id');
			$this->db->where('id', $link_id);
			$this->db->update('links', $data);
			$target_dir     = "assets/uploads/links/" . $Image_New_Name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir);
		}
		$this->crud_model->clear_cache();
		$this->session->set_flashdata('update_success', 'Updated Sucessfully');
		redirect('admin/manage_links', 'refresh');
	}

	/*Show Gallery and Title table view*/
	public function manage_links()
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}

		$query                   = $this->db->get('links');
		$data['link_content'] = $query->result_array();
		//$data['blog_category_name'] = $param;
		$this->load->view('manage_links', $data);
	}

	/*Set Status of Link Image*/
	public function link_ajax_active_inactive()
	{
		$string = $this->input->post('string');
		$id     = $this->input->post('id');

		//echo $string . " " . $id;

		$data = [
			'status' => $string
		];

		$this->db->where('id', $id);
		$this->db->update('links', $data);
	}

	/* Delete Link Image using Ajax*/
	public function ajax_delete_link()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('links');
		//unlink(base_url()."assets/uploads/blogs/".$filename);
	}

	/* Edit Link Details*/
	public function edit_link($link_id)
	{
		if ($this->session->userdata('admin_login') != 1) {
			redirect('login', 'refresh');
		}
		if ($link_id == null) {
			redirect('admin', 'refresh');
		}
		$query                   = $this->db->query("SELECT * FROM links WHERE id = '$link_id'");
		$data['link_content'] = $query->row();
		$this->load->view('edit_link', $data);
	}

	/*======================================Link End=========================================================*/

}