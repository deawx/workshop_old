<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

  function index()
  {
		$this->elements['content'] = $this->load->view('main', array(), TRUE);
		$this->load->view('_layouts/scrollbar', $this->elements);
  }

  function show()
  {
    if ( ! $this->session->has_userdata('is_mother')) redirect('main/signin_mother');
    $profile = $this->session->userdata();
    $page = ($this->input->get('p')) ? $this->input->get('p') : 'history';
    $this->params['body'] = [];
    switch ($page) :
      case 'pregnant':
      $tables = $this->common->search('mother_pregnant',array('mother_id'=>$profile['id']),'','','id ASC')->result_array();
      $tb = '<hr/>';
      foreach ($tables as $_t) :
        $care = $this->common->search('mother_pregnant_care',['pregnant_id'=>$_t['id']],'','','id ASC')->result_array();
        $tb .= '<table class="table table-bordered table-hover">';
        $tb .= '<thead><tr><th>ครรภ์ที่</th><th>กำหนดคลอด</th><th>น้ำหนักก่อนคลอด</th><th>การผ่าคลอด(จำนวนครั้ง)</th></tr></thead><tbody>';
        $tb .= '<tr>';
        $tb .= '<td>'.$_t['due_no'].'</td>';
        $tb .= '<td>'.$_t['due_date'].'</td>';
        $tb .= '<td>'.$_t['weight'].'</td>';
        $tb .= '<td>'.$_t['cesarean'].'</td>';
        $tb .= '</tr>';
        $tb .= '<table class="table table-striped">';
        $tb .= '<thead><tr><th style="width:20%;">การตรวจครรภ์(ครั้งที่)</th><th>วันที่</th><th></th></thead><tbody>';
        foreach ($care as $_k => $_c) :
          $tb .= '<tr>';
          $tb .= '<td>'.++$_k.'</td>';
          $tb .= '<td>'.$_c['date'].'</td>';
          $tb .= '<td>'.anchor('main/show_pregnant_care/'.$_c['id'],'<i class="fa fa-reply fa-lg"></i>',['target'=>'_blank']).'</td>';
          $tb .= '</tr>';
        endforeach;
        $tb .= '</tbody></table>';
        $tb .= '</tbody></table>';
      endforeach;
      $this->elements['content'] = $tb;
       break;
      case 'child':
      $tables = $this->common->search('child',['mother_id'=>$profile['id']],'','','id ASC')->result_array();
      $tb = '<hr/>';
      foreach ($tables as $_t) :
        $tb .= '<table class="table table-bordered table-hover">';
        $tb .= '<thead><tr><th>รูปภาพ</th><th>วันคลอด</th><th>ชื่อ - นามสกุล</th><th>ความยาว</th><th>น้ำหนัก</th><th>ขนาดศีรษะ</th><th>เพศ</th><th></th></thead><tbody>';
        $tb .= '<tr>';
        $tb .= '<td>'.img('assets/uploads/pictures/'.$_t['picture'],'',['class'=>'img-rounded']).'</td>';
        $tb .= '<td>'.$_t['birthdate'].'</td>';
        $tb .= '<td>'.$_t['name'].nbs(3).$_t['surname'].'</td>';
        $tb .= '<td>'.$_t['height'].'</td>';
        $tb .= '<td>'.$_t['weight'].'</td>';
        $tb .= '<td>'.$_t['round'].'</td>';
        $tb .= '<td>'.$_t['gender'].'</td>';
        $tb .= '<td>'.anchor('main/show_physical/'.$_t['id'],'<i class="fa fa-line-chart fa-lg"></i>',['target'=>'_blank']).nbs(5).anchor('main/show_vaccination/'.$_t['id'],'<i class="fa fa-user-md fa-lg"></i>',['target'=>'_blank']).'</td>';
        $tb .= '</tr>';
        $tb .= '</tbody></table>';
      endforeach;
      $this->elements['content'] = $tb;
       break;
     default:
     $this->params['body'] = [
       'ชื่อ - นามสกุล' => $profile['name'].nbs(3).$profile['surname'],
       'หมายเลขบัตรประชาชน' => $profile['card'],
       'วันเกิด' => $profile['birthdate'],
       'ส่วนสูง' => $profile['height'],
       'น้ำหนัก' => $profile['weight'],
       'อีเมล์' => $profile['email'],
       'โทรศัพท์' => $profile['phone'],
       'ที่อยู่' => $profile['address'],
       'อาชีพ' => $profile['occupation'],
       'ศาสนา' => $profile['religion'],
       'การคุมกำเนิด' => $profile['contraception'],
       'การเจ๊บป่วย' => $profile['patient'],
       'การผ่าตัด' => $profile['surgery'],
       'การแพ้ยา' => $profile['medical'],
       'ชื่อ - นามสกุล (คู่สมรส)' => $profile['ft_name'].nbs(3).$profile['ft_surname'],
       'หมายเลขบัตรประชาชน (คู่สมรส)' => $profile['ft_card'],
       'อีเมล์ (คู่สมรส)' => $profile['ft_email'],
       'โทรศัพท์ (คู่สมรส)' => $profile['ft_phone']
     ];
     $this->elements['content'] = $this->load->view('_pages/mother', $this->params, TRUE);
       break;
    endswitch;
    $this->elements['navs'] = $this->_navs($profile);
    $this->load->view('_layouts/navs', $this->elements);
  }

  function _navs($profile)
  {
    $this->params['head'] = $profile['name'].nbs(3).$profile['surname'];
    $this->params['picture'] = $profile['picture'];
    $this->params['body'] = ([
      anchor('main/show?p=history','ประวัติส่วนตัว'),
      anchor('main/show?p=pregnant','ข้อมูลการตั้งครรภ์'),
      anchor('main/show?p=child','ข้อมูลบุตร')
    ]);
    return $this->load->view('_elements/media', $this->params, TRUE);
  }

  function show_physical($id)
  {
    $tables = $this->common->search('child_physical',['child_id'=>$id],'','','month ASC')->result_array();
    $row = array();
    foreach ($tables as $_k => $_t) :
      $row[$_k]['month']	= $_t['month'];
      $row[$_k]['height']	= $_t['height'];
      $row[$_k]['weight']	= $_t['weight'];
      $row[$_k]['round']	= $_t['round'];
    endforeach;
    $this->table->set_heading(array('เดือนที่','ส่วนสูง','น้ำหนัก','ขนาดวงรอบศีรษะ'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-striped">'));

    $graph = $this->common->search('child_physical',['child_id'=>$id],'60','','id ASC')->result_array();
    $height = []; $weight = []; foreach ($graph as $_k => $_g) { $height[] = $_g['height']; $weight[] = $_g['weight']; }
    $this->elements['script_js'] = "
    $(function(){
      var midhigh = [
       [0, 3.9, 4.1], [1, 4.7, 5.0], [2, 5.5, 5.9], [3, 6.4, 6.8], [4, 7.1, 7.4], [5, 7.8, 8.1], [6, 8.4, 8.9], [7, 9.0, 9.5], [8, 9.4, 10.0], [9, 9.7, 10.4],
       [10, 10.2, 10.8], [11, 10.6, 11.1], [12, 11.0, 11.5], [13, 11.4, 11.8], [14, 11.6, 12.2], [15, 12.0, 12.6], [16, 12.4, 12.9], [17, 12.6, 13.2], [18, 12.9, 13.5], [19, 13.2, 13.8],
       [20, 13.5, 14.1], [21, 13.7, 14.4], [22, 14.0, 14.6], [23, 14.2, 14.9], [24, 14.4, 15.1], [25, 14.6, 15.4], [26, 14.9, 15.6], [27, 15.1, 15.9], [28, 15.4, 16.1], [29, 15.6, 16.4],
       [30, 15.8, 16.6], [31, 16.1, 16.9], [32, 16.4, 17.1], [33, 16.6, 17.4], [34, 16.8, 17.6], [35, 17.0, 17.9], [36, 17.3, 18.1], [37, 17.5, 18.4], [38, 17.7, 18.7], [39, 17.9, 18.9],
       [40, 18.2, 19.2], [41, 18.4, 19.5], [42, 18.5, 19.7], [43, 18.8, 20.0], [44, 19.0, 20.3], [45, 19.3, 20.5], [46, 19.5, 20.8], [47, 19.7, 21.0], [48, 20.0, 21.3], [49, 20.2, 21.5],
       [50, 20.4, 21.7], [51, 20.6, 22.0], [52, 20.8, 22.2], [53, 21.1, 22.4], [54, 21.3, 22.7], [55, 21.5, 22.9], [56, 21.7, 23.2], [57, 21.9, 23.5], [58, 22.2, 23.7], [59, 22.4, 24.0],
       [60, 22.6, 24.3], [61, 22.9, 24.5], [62, 23.1, 24.8], [63, 23.4, 25.0], [64, 23.5, 25.3], [65, 23.8, 25.5], [66, 24.0, 25.8], [67, 24.3, 26.0], [68, 24.5, 26.3], [69, 24.7, 26.5], [70, 25.0, 26.7], [71, 25.2, 27.0], [72, 25.4, 27.2]
      ];
      var mid = [
       [0, 2.9, 3.9], [1, 3.5, 4.7], [2, 4.2, 5.5], [3, 4.8, 6.4], [4, 5.4, 7.1], [5, 5.8, 7.8], [6, 6.4, 8.4], [7, 6.7, 9.0], [8, 7.2, 9.4], [9, 7.6, 9.7],
       [10, 7.9, 10.2], [11, 8.1, 10.6], [12, 8.4, 11.0], [13, 8.5, 11.4], [14, 8.7, 11.6], [15, 8.9, 12.0], [16, 9.1, 12.4], [17, 9.3, 12.6], [18, 9.4, 12.9], [19, 9.6, 13.2], [20, 9.8, 13.5],
       [21, 10.0, 13.7], [22, 10.2, 14.0], [23, 10.4, 14.2], [24, 10.5, 14.4], [25, 10.6, 14.6], [26, 10.8, 14.9], [27, 10.9, 15.1], [28, 11.1, 15.4], [29, 11.2, 15.6], [30, 11.4, 15.8],
       [31, 11.5, 16.1], [32, 11.6, 16.4], [33, 11.8, 16.6], [34, 11.9, 16.8], [35, 12.0, 17.0], [36, 12.2, 17.3], [37, 12.4, 17.5], [38, 12.5, 17.7], [39, 12.6, 17.9], [40, 12.7, 18.2],
       [41, 12.8, 18.4], [42, 12.9, 18.5], [43, 13.0, 18.8], [44, 13.1, 19.0], [45, 13.2, 19.3], [46, 13.4, 19.5], [47, 13.5, 19.7], [48, 13.6, 20.0], [49, 13.7, 20.2], [50, 13.8, 20.4],
       [51, 14.0, 20.6], [52, 14.1, 20.8], [53, 14.2, 21.1], [54, 14.3, 21.3], [55, 14.4, 21.5], [56, 14.5, 21.7], [57, 14.6, 21.9], [58, 14.8, 22.2], [59, 14.9, 22.4], [60, 15.0, 22.6],
       [61, 15.1, 22.9], [62, 15.3, 23.1], [63, 15.4, 23.4], [64, 15.5, 23.5], [65, 15.7, 23.8], [66, 15.8, 24.0], [67, 16.0, 24.3], [68, 16.1, 24.5], [69, 16.3, 24.7], [70, 16.4, 25.0], [71, 16.5, 25.2], [72, 16.6, 25.4]
      ];
      var midlow = [
       [0, 2.7, 2.9], [1, 3.3, 3.5], [2, 3.8, 4.2], [3, 4.5, 4.8], [4, 5.0, 5.4], [5, 5.5, 5.8], [6, 5.9, 6.4], [7, 6.4, 6.7], [8, 6.7, 7.2], [9, 7.2, 7.6], [10, 7.5, 7.9],
       [11, 7.7, 8.1], [12, 7.9, 8.4], [13, 8.1, 8.5], [14, 8.3, 8.7], [15, 8.5, 8.9], [16, 8.6, 9.1], [17, 8.8, 9.3], [18, 9.0, 9.4], [19, 9.1, 9.6], [20, 9.2, 9.8],
       [21, 9.4, 10.0], [22, 9.5, 10.2], [23, 9.6, 10.4], [24, 9.8, 10.5], [25, 10.0, 10.6], [26, 10.1, 10.8], [27, 10.2, 10.9], [28, 10.4, 11.1], [29, 10.5, 11.2], [30, 10.6, 11.4],
       [31, 10.7, 11.5], [32, 10.8, 11.6], [33, 11.0, 11.8], [34, 11.1, 11.9], [35, 11.3, 12.0], [36, 11.4, 12.2], [37, 11.5, 12.4], [38, 11.6, 12.5], [39, 11.7, 12.6], [40, 11.8, 12.7],
       [41, 11.9, 12.8], [42, 12.0, 12.9], [43, 12.2, 13.0], [44, 12.3, 13.1], [45, 12.4, 13.2], [46, 12.5, 13.4], [47, 12.6, 13.5], [48, 12.7, 13.6], [49, 12.8, 13.7], [50, 12.9, 13.8],
       [51, 13.1, 14.0], [52, 13.2, 14.1], [53, 13.3, 14.2], [54, 13.4, 14.3], [55, 13.5, 14.4], [56, 13.6, 14.5], [57, 13.7, 14.6], [58, 13.9, 14.8], [59, 14.0, 14.9], [60, 14.1, 15.0],
       [61, 14.2, 15.1], [62, 14.4, 15.3], [63, 14.5, 15.4], [64, 14.6, 15.5], [65, 14.7, 15.7], [66, 14.8, 15.8], [67, 15.0, 16.0], [68, 15.1, 16.1], [69, 15.2, 16.3], [70, 15.4, 16.4], [71, 15.5, 16.5], [72, 15.5, 16.6]
      ];
      var low = [
           [0, 0, 2.7], [1, 0, 3.3], [2, 0, 3.8], [3, 0, 4.5], [4, 0, 5.0], [5, 0, 5.5], [6, 0, 5.9], [7, 0, 6.4], [8, 0, 6.7], [9, 0, 7.2], [10, 0, 7.5],
           [11, 0, 7.7], [12, 0, 7.9], [13, 0, 8.1], [14, 0, 8.3], [15, 0, 8.5], [16, 0, 8.6], [17, 0, 8.8], [18, 0, 9.0], [19, 0, 9.1], [20, 0, 9.2],
           [21, 0, 9.4], [22, 0, 9.5], [23, 0, 9.6], [24, 0, 9.8], [25, 0, 10.0], [26, 0, 10.1], [27, 0, 10.2], [28, 0, 10.4], [29, 0, 10.5], [30, 0, 10.6],
           [31, 0, 10.7], [32, 0, 10.8], [33, 0, 11.0], [34, 0, 11.1], [35, 0, 11.3], [36, 0, 11.4], [37, 0, 11.5], [38, 0, 11.6], [39, 0, 11.7], [40, 0, 11.8],
           [41, 0, 11.9], [42, 0, 12.0], [43, 0, 12.2], [44, 0, 12.3], [45, 0, 12.4], [46, 0, 12.5], [47, 0, 12.6], [48, 0, 12.7], [49, 0, 12.8], [50, 0, 12.9],
           [51, 0, 13.1], [52, 0, 13.2], [53, 0, 13.3], [54, 0, 13.4], [55, 0, 13.5], [56, 0, 13.6], [57, 0, 13.7], [58, 0, 13.9], [59, 0, 14.0], [60, 0, 14.1],
           [61, 0, 14.2], [62, 0, 14.4], [63, 0, 14.5], [64, 0, 14.6], [65, 0, 14.7], [66, 0, 14.8], [67, 0, 15.0], [68, 0, 15.1], [69, 0, 15.2], [70, 0, 15.4], [71, 0, 15.5], [72, 0, 15.5]
        ],
        avg = [
          [0, 2.5], [1, 2.5], [2, 22.1], [3, 23.0], [4, 23.8], [5, 21.4], [6, 21.3], [7, 18.3], [8, 15.4], [9, 16.4], [10, 17.7],
          [11, 17.7], [12, 17.7], [13, 17.7], [14, 17.7], [15, 17.7], [16, 17.7], [17, 17.7], [18, 17.7], [19, 17.7], [20, 17.7],
          [21, 17.7], [22, 17.7], [23, 17.7], [24, 17.7], [25, 17.7], [26, 17.7], [27, 17.7], [28, 17.7], [29, 17.7], [30, 17.7],
          [31, 17.7], [32, 17.7], [33, 17.7], [34, 17.7], [35, 17.7], [36, 17.7], [37, 17.7], [38, 17.7], [39, 17.7], [40, 17.7],
          [41, 17.7], [42, 17.7], [43, 17.7], [44, 17.7], [45, 17.7], [46, 17.7], [47, 17.7], [48, 17.7], [49, 17.7], [50, 17.7],
          [51, 17.7], [52, 17.7], [53, 17.7], [54, 17.7], [55, 17.7], [56, 17.7], [57, 17.7], [58, 17.7], [59, 17.7], [60, 17.7],
          [61, 17.7], [62, 17.7], [63, 17.7], [64, 17.7], [65, 17.7], [66, 17.7], [67, 17.7], [68, 17.7], [69, 17.7], [70, 17.7], [71, 17.7], [72, 17.7],
      ];
      var midtall = [
        [0, 53.8, 54.8], [1, 56.4, 57.8], [2, 59.0, 60.7], [3, 62.0, 63.2], [4, 64.6, 65.9], [5, 67.0, 68.3], [6, 69.0, 70.8], [7, 71.2, 72.7], [8, 73.2, 74.7], [9, 75.0, 76.7], [10, 76.8, 78.2],
        [11, 78.5, 80.0], [12, 80.0, 81.3], [13, 81.3, 82.9], [14, 82.6, 84.1], [15, 83.8, 85.5], [16, 84.8, 86.7], [17, 85.8, 87.8], [18, 86.8, 88.8], [19, 87.8, 89.6], [20, 88.7, 90.3],
        [21, 89.5, 91.2], [22, 90.2, 92.1], [23, 91.0, 93.0], [24, 91.9, 93.8], [25, 92.8, 94.6], [26, 93.7, 95.3], [27, 94.2, 96.0], [28, 95.0, 96.8], [29, 95.9, 97.5], [30, 96.7, 98.2],
        [31, 97.2, 99.0], [32, 97.9, 99.9], [33, 98.8, 100.6], [34, 99.5, 101.2], [35, 100.0, 102.0], [36, 100.7, 102.8], [37, 101.4, 103.2], [38, 102.1, 103.9], [39, 102.9, 104.8], [40, 103.9, 105.1],
        [41, 104.0, 105.9], [42, 104.8, 106.6], [43, 105.2, 107.0], [44, 105.9, 107.8], [45, 106.5, 108.3], [46, 107.1, 109.0], [47, 107.8, 109.8], [48, 108.2, 110.1], [49, 108.9, 110.9], [50, 109.4, 111.5],
        [51, 110.0, 112.0], [52, 110.6, 112.8], [53, 111.1, 113.2], [54, 111.8, 113.9], [55, 112.2, 114.6], [56, 112.9, 115.1], [57, 113.4, 115.8], [58, 114.0, 116.2], [59, 114.7, 116.9], [60, 115.0, 117.2],
        [61, 115.8, 117.9], [62, 116.2, 118.5], [63, 116.9, 119.0], [64, 117.2, 119.6], [65, 117.9, 120.0], [66, 118.2, 120.8], [67, 118.9, 121.2], [68, 119.3, 121.9], [69, 120.0, 122.2], [70, 120.3, 122.9], [71, 121.0, 123.3], [72, 121.3, 124.0]
      ];
      var mids = [
        [0, 48.0, 53.8], [1, 50.5, 56.4], [2, 53.3, 59.0], [3, 55.9, 62.0], [4, 58.0, 64.6], [5, 60.5, 67.0], [6, 62.5, 69.0], [7, 64.3, 71.2], [8, 66.0, 73.2], [9, 67.7, 75.0], [10, 69.0, 76.8],
        [11, 70.2, 78.5], [12, 71.5, 80.0], [13, 72.7, 81.3], [14, 73.5, 82.6], [15, 74.4, 83.8], [16, 75.4, 84.8], [17, 76.3, 85.8], [18, 77.0, 86.8], [19, 77.9, 87.8], [20, 78.8, 88.7],
        [21, 79.5, 89.5], [22, 80.1, 90.2], [23, 81.0, 91.0], [24, 81.8, 91.9], [25, 82.5, 92.8], [26, 83.1, 93.7], [27, 83.9, 94.2], [28, 84.6, 95.0], [29, 85.1, 95.9], [30, 85.9, 96.7],
        [31, 86.5, 97.2], [32, 87.0, 97.9], [33, 87.6, 98.8], [34, 88.2, 99.5], [35, 88.9, 100.0], [36, 89.3, 100.7], [37, 90.0, 101.4], [38, 90.5, 102.1], [39, 91.1, 102.9], [40, 91.8, 103.9],
        [41, 92.1, 104.0], [42, 92.9, 104.8], [43, 93.5, 105.2], [44, 94.0, 105.9], [45, 94.6, 106.5], [46, 95.0, 107.1], [47, 95.7, 107.8], [48, 96.5, 108.2], [49, 96.8, 108.9], [50, 97.1, 109.4],
        [51, 97.8, 110.0], [52, 98.1, 110.6], [53, 98.8, 111.1], [54, 99.1, 111.8], [55, 99.8, 112.2], [56, 100.1, 112.9], [57, 100.8, 113.4], [58, 101.1, 114.0], [59, 101.8, 114.7], [60, 102.1, 115.0],
        [61, 102.8, 115.8], [62, 103.1, 116.2], [63, 103.8, 116.9], [64, 104.0, 117.2], [65, 104.7, 117.9], [66, 105.0, 118.2], [67, 105.7, 118.9], [68, 106.0, 119.3], [69, 106.6, 120.0], [70, 107.0, 120.3], [71, 107.5, 121.0], [72, 108.0, 121.3]
      ];
      var midshort = [
        [0, 47.0, 48.0], [1, 50.0, 50.5], [2, 52.5, 53.3], [3, 55.0, 55.9], [4, 57.1, 58.0], [5, 59.5, 60.5], [6, 61.5, 62.5], [7, 63.0, 64.3], [8, 64.9, 66.0], [9, 66.4, 67.7], [10, 67.8, 69.0],
        [11, 69.0, 70.2], [12, 70.1, 71.5], [13, 71.1, 72.7], [14, 72.0, 73.5], [15, 73.0, 74.4], [16, 73.9, 75.4], [17, 74.9, 76.3], [18, 75.8, 77.0], [19, 76.4, 77.9], [20, 77.2, 78.8],
        [21, 78.0, 79.5], [22, 78.7, 80.1], [23, 79.5, 81.0], [24, 80.0, 81.8], [25, 80.9, 82.5], [26, 81.5, 83.1], [27, 82.0, 83.9], [28, 82.9, 84.6], [29, 83.4, 85.1], [30, 84.0, 85.9],
        [31, 84.7, 86.5], [32, 85.2, 87.0], [33, 85.9, 87.6], [34, 86.5, 88.2], [35, 87.0, 88.9], [36, 87.5, 89.3], [37, 88.1, 90.0], [38, 88.8, 90.5], [39, 89.2, 91.1], [40, 89.9, 91.8],
        [41, 90.2, 92.1], [42, 90.9, 92.9], [43, 91.3, 93.5], [44, 92.0, 94.0], [45, 92.5, 94.6], [46, 93.0, 95.0], [47, 93.6, 95.7], [48, 94.0, 96.5], [49, 94.6, 96.8], [50, 95.0, 97.1],
        [51, 95.6, 97.8], [52, 96.0, 98.1], [53, 96.7, 98.8], [54, 97.0, 99.1], [55, 97.6, 99.8], [56, 98.0, 100.1], [57, 98.5, 100.8], [58, 99.0, 101.1], [59, 99.5, 101.8], [60, 100.0, 102.1],
        [61, 100.5, 102.8], [62, 101.0, 103.1], [63, 101.5, 103.8], [64, 101.9, 104.0], [65, 102.2, 104.7], [66, 102.9, 105.0], [67, 103.2, 105.7], [68, 103.8, 106.0], [69, 104.1, 106.6], [70, 104.8, 107.0], [71, 105.1, 107.5], [72, 105.7, 108.0]
      ];
      var short = [
          [0, 40, 47.0], [1, 40, 50.0], [2, 40, 52.5], [3, 40, 55.0], [4, 40, 57.1], [5, 40, 59.5], [6, 40, 61.5], [7, 40, 63.0], [8, 40, 64.9], [9, 40, 66.4], [10, 40, 67.8],
          [11, 40, 69.0], [12, 40, 70.1], [13, 40, 71.1], [14, 40, 72.0], [15, 40, 73.0], [16, 40, 73.9], [17, 40, 74.9], [18, 40, 75.8], [19, 40, 76.4], [20, 40, 77.2],
          [21, 40, 78.0], [22, 40, 78.7], [23, 40, 79.5], [24, 40, 80.0], [25, 40, 80.9], [26, 40, 81.5], [27, 40, 82.0], [28, 40, 82.9], [29, 40, 83.4], [30, 40, 84.0],
          [31, 40, 84.7], [32, 40, 85.2], [33, 40, 85.9], [34, 40, 86.5], [35, 40, 87.0], [36, 40, 87.5], [37, 40, 88.1], [38, 40, 88.8], [39, 40, 89.2], [40, 40, 89.9],
          [41, 40, 90.2], [42, 40, 90.9], [43, 40, 91.3], [44, 40, 92.0], [45, 40, 92.5], [46, 40, 93.0], [47, 40, 93.6], [48, 40, 94.0], [49, 40, 94.6], [50, 40, 95.0],
          [51, 40, 95.6], [52, 40, 96.0], [53, 40, 96.7], [54, 40, 97.0], [55, 40, 97.6], [56, 40, 98.0], [57, 40, 98.5], [58, 40, 99.0], [59, 40, 99.5], [60, 40, 100.0],
          [61, 40, 100.5], [62, 40, 101.0], [63, 40, 101.5], [64, 40, 101.9], [65, 40, 102.2], [66, 40, 102.9], [67, 40, 103.2], [68, 40, 103.8], [69, 40, 104.1], [70, 40, 104.8], [71, 40, 105.1], [72, 40, 105.7]
        ],
        avg = [
          [0, 2.5], [1, 2.5], [2, 22.1], [3, 23.0], [4, 23.8], [5, 21.4], [6, 21.3], [7, 18.3], [8, 15.4], [9, 16.4], [10, 17.7],
          [11, 17.7], [12, 17.7], [13, 17.7], [14, 17.7], [15, 17.7], [16, 17.7], [17, 17.7], [18, 17.7], [19, 17.7], [20, 17.7],
          [21, 17.7], [22, 17.7], [23, 17.7], [24, 17.7], [25, 17.7], [26, 17.7], [27, 17.7], [28, 17.7], [29, 17.7], [30, 17.7],
          [31, 17.7], [32, 17.7], [33, 17.7], [34, 17.7], [35, 17.7], [36, 17.7], [37, 17.7], [38, 17.7], [39, 17.7], [40, 17.7],
          [41, 17.7], [42, 17.7], [43, 17.7], [44, 17.7], [45, 17.7], [46, 17.7], [47, 17.7], [48, 17.7], [49, 17.7], [50, 17.7],
          [51, 17.7], [52, 17.7], [53, 17.7], [54, 17.7], [55, 17.7], [56, 17.7], [57, 17.7], [58, 17.7], [59, 17.7], [60, 17.7],
          [61, 17.7], [62, 17.7], [63, 17.7], [64, 17.7], [65, 17.7], [66, 17.7], [67, 17.7], [68, 17.7], [69, 17.7], [70, 17.7], [71, 17.7], [72, 17.7]
      ];
      $('#weight').highcharts({
        chart: { height: 600 },
        title : { text : 'กราฟแสดงน้ำหนักตามอายุ', },
        plotOptions: { area: { stacking: 'percent', lineColor: '#ffffff', lineWidth: 1, marker: { lineWidth: 1, lineColor: '#ffffff' } } },
        xAxis :{ title :{ text : 'อายุ(เดือน)' } },
        yAxis : { maxStaggerLines : 5, title : { text : 'น้ำหนัก(กก.)' } },
        series: [{
          data: low, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[0], fillOpacity: 0.3, zIndex: 0
        },{
          data: midlow, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[1], fillOpacity: 0.3, zIndex: 0
        },{
          data: mid, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[2], fillOpacity: 0.3, zIndex: 0
        },{
          data: midhigh, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[3], fillOpacity: 0.3, zIndex: 0
        },{
          data: [".implode(',',array_values($weight))."], type: 'line'
        }]
      });
      $('#height').highcharts({
        chart: { height: 600 },
        title : {text : 'กราฟแสดงส่วนสูงตามอายุ'},
        xAxis : { title : { text : 'อายุ(เดือน)' } },
        yAxis : { title : { text : 'ส่วนสูง(ซม.)' }, min : 35 },
        series: [{
          data: short, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[0], fillOpacity: 0.3, zIndex: 0
        },{
          data: midshort, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[1], fillOpacity: 0.3, zIndex: 0
        },{
          data: mids, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[2], fillOpacity: 0.3, zIndex: 0
        },{
          data: midtall, type: 'arearange', lineWidth: 0, linkedTo: ':previous', color: Highcharts.getOptions().colors[3], fillOpacity: 0.3, zIndex: 0
        },{
          data: [".implode(',',array_values($height))."], type: 'line'
        }]
      });
    });";
    $profile = $this->common->search_id('child',$id)->row_array();
    $this->elements['content'] = anchor($this->agent->referrer().$id,'<i class="fa fa-reply fa-lg"></i>',['class'=>'btn btn-primary btn-block']).br();
    $this->elements['content'] .= '<button class="btn" style="background-color:#D8E9F9;" disabled="TRUE">สีฟ้า=น้อยกว่าเกณฑ์</button>'.nbs(5);
    $this->elements['content'] .= '<button class="btn" style="background-color:#C7C7C8;" disabled="TRUE">สีเทา=ค่อนข้างน้อย</button>'.nbs(5);
    $this->elements['content'] .= '<button class="btn" style="background-color:#DEFAD8;" disabled="TRUE">สีเขียว=อยู่ในเกณฑ์</button>'.nbs(5);
    $this->elements['content'] .= '<button class="btn" style="background-color:#FDE4CE;" disabled="TRUE">สีแดง=ค่อนข้างมาก</button>'.nbs(5);
    $this->elements['content'] .= '<button class="btn" style="background-color:#FFFFFF;" disabled="TRUE">มากกว่าเกณฑ์</button>';
    $this->elements['content'] .= '<br/><div id="height" height="600" width="600"></div><hr/><br/>';
    $this->elements['content'] .= '<br/><div id="weight" height="600" width="600"></div><hr/><br/>';
    $this->load->view('_layouts/blank', $this->elements);
  }

  function show_vaccination($id)
  {
    $locale = $this->common->search('organize')->result_array();
    $this->params['locale'] = [''=>'เลือกสถานที่'];
    foreach ($locale as $_k => $_l) :
      $this->params['locale'][$_l['name']] = $_l['name'];
    endforeach;
    $this->params['vaccine'] = $this->common->search('child_vaccination',['child_id'=>$id])->row_array();
    $this->load->view('_pages/vaccine', $this->params);
  }

  function show_pregnant_care($id)
  {
    $this->elements['link_tag'] = [];
    $this->elements['script_tag'] = [];
    $this->elements['script_jq'] = [];
    $this->elements['script_js'] = [];
    $care = $this->common->search('mother_pregnant_care',array('id'=>$id))->row_array();
    $this->params['body'] = [
      'วันที่' => $care['date'],
      'น้ำหนัก' => $care['weight'],
      'ปัสสาวะ' => $care['urine'],
      'ความดันโลหิต' => $care['pressure'],
      'ขนาดมดลูก' => $care['uterine'],
      'การขยับตัว(ทารก)' => $care['present'],
      'เสียงหัวใจ(ทารก)' => $care['sound'],
      'การดิ้น(ทารก)' => $care['flex'],
      'อายุครรภ์(สัปดาห์)' => $care['term'],
      'การตรวจร่างกาย' => $care['physical'],
      'การวินิจฉัย' => $care['diagnosis']
    ];
    $this->elements['content'] = $this->load->view('_elements/describtion', $this->params, TRUE);
    $this->load->view('_layouts/blank', $this->elements);
  }

  function article()
  {
    $this->load->helper(['directory','file']);
    $tables = directory_map('assets/uploads/files');
    $row = array();
    foreach ($tables as $_k => $_t) :
      $download = anchor('assets/uploads/files/'.$_t,'<i class="fa fa-file-pdf-o fa-lg"></i>',['target'=>'_blank','class'=>'btn btn-link']);
      $row[$_k]['no']	= $_k+1;
      $row[$_k]['ชื่อไฟล์']	= explode('_',$_t)[0];
      $row[$_k]['ประเภทไฟล์']	= get_mime_by_extension($_t).'<span class="pull-right">'.$download.'</span>';
    endforeach;
    $this->table->set_heading(array('no','ชื่อไฟล์','ประเภทไฟล์'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
    $this->elements['content'] = $this->table->generate($row);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function signin_mother()
  {
    if ($this->input->post('card')) :
      $mother = $this->db->get_where('mother',array('card'=>$this->input->post('card')));
      if ($mother->num_rows() > 0) :
        $this->session->set_userdata($mother->row_array());
        $this->session->set_userdata('is_login',TRUE);
        $this->session->set_userdata('is_mother',TRUE);
        redirect($this->agent->referrer());
      else:
        $this->callback('ไม่พบข้อมูลในระบบ');
        redirect($this->agent->referrer());
      endif;
    endif;
    if ($this->session->has_userdata('is_staff')) redirect('main');
    if ($this->session->has_userdata('is_mother')) redirect('main/show');
    $this->table->set_heading(array('no','ชื่อไฟล์','ประเภทไฟล์'));
    $this->table->set_template(array('table_open'  => '<table class="table table-bordered table-hover datatable">'));
      $this->params['head'] = 'เข้าสู่ระบบ สำหรับมารดา<hr/>';
      $this->params['form'] = [
        ['label'=>form_label(ucfirst('เลขบัตรประชาชน'),'card',array('class'=>'control-label text-right col-sm-3')),
        'input'=>form_number(array('name'=>'card','type'=>'number','class'=>'form-control','required'=>TRUE,'data-minlength'=>'13')),
        'help'=>'']
      ];
    $this->elements['content'] = $this->load->view('_elements/form', $this->params, TRUE);
    $this->load->view('_layouts/scrollbar', $this->elements);
  }

  function signin()
  {
    $data = $this->input->post();
    $staff = $this->db->get_where('staff',array('email'=>$data['email'],'password'=>$data['password']));
    if ($staff->num_rows() > 0) :
      $staff = $staff->row_array();
      $this->session->set_userdata($staff);
      $this->session->set_userdata('is_login',TRUE);
      ($staff['role'] == '1')  ? $this->session->set_userdata(['is_staff'=>TRUE,'is_admin'=>TRUE]) : $this->session->set_userdata('is_staff',TRUE);
      redirect($this->agent->referrer());
    else:
      $this->callback('ไม่พบข้อมูลในระบบ');
      redirect($this->agent->referrer());
    endif;
  }

  function signout()
  {
    $this->session->sess_destroy();
    redirect('main');
  }

}
