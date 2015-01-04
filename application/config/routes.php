<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "frontend/index";
$route['new/sach-moi-cap-nhat.html']="frontend/product/listproduct/new";
$route['rating/sach-duoc-binh-chon-nhieu-nhat.html']="frontend/product/listproduct/rating";
$route['hay/sach-duoc-thue-nhieu-nhat.html']="frontend/product/listproduct/hay";
$route['(:num)/sach/(:any).html'] = "frontend/product/index";
$route['lien-he.html']= "frontend/contact";
$route['gioi-thieu.html']= "frontend/about";
$route['giao-dich-van-chuyen.html']= "frontend/about";
$route['bai-viet.html']= "frontend/article/index";
$route['bai-viet/post/(:num)']= "frontend/article/index";
$route['bai-viet/post']= "frontend/article";
$route['bai-viet/(:any)_post(:num).html']= "frontend/article/post/";
$route['danh-muc/(:any)_post(:num).html']= "frontend/category";
$route['san-pham/(:any)_post(:num).html']= "frontend/category/post";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */