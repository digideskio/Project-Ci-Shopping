<?php
class Mproduct extends MY_Model{
	protected $_table="products";
	public function __construct(){
		parent::__construct();
	}
	public function insertProduct($name, $info, $price, $type, $category, $img, $company, $quantily)
	{
		$query = $this->db->query('INSERT INTO products (productname, productinfo, productprice, producttype, productcategory, productimages, company, productquantity )
		 VALUES ("'.$name.'", "'.$info.'", "'.$price.'", "'.$type.'", "'.$category.'", "'.$img.'", "'.$company.'", "'.$quantily.'")');
		return "OK";
	}
	public function listType()
	{
		$query = $this->db->query('SELECT * FROM product_types');
		return $query->result_array();
	}
	public function listCate()
	{
		$query = $this->db->query('SELECT * FROM product_categories');
		return $query->result_array();
	}
	public function listCom()
	{
		$query = $this->db->query('SELECT * FROM company');
		return $query->result_array();
	}
	public function listProduct()
	{
		$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_types T2 ON T1.producttype = T2.ptid
		 INNER JOIN product_categories T3 ON T1.productcategory = T3.pcid
		 INNER JOIN company T4 ON T1.company = T4.cid ORDER BY productid DESC');
		return $query->result_array();
	}
	public function getProductById($id)
	{
		$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_types T2 ON T1.producttype = T2.ptid
		 INNER JOIN product_categories T3 ON T1.productcategory = T3.pcid
		 INNER JOIN company T4 ON T1.company = T4.cid WHERE productid = '.$id.'');
		return $query->row_array();
	}
	public function updateProductById($name, $info, $price, $type, $category, $img, $company, $quantily, $id)
	{
		if($img == NULL || $img == '[]')
		{
			$query = $this->db->query('UPDATE products SET productname ="'.$name.'", productinfo="'.$info.'", productprice="'.$price.'",producttype="'.$type.'"
			,productcategory="'.$category.'", company="'.$company.'", productquantity="'.$quantily.'" WHERE productid="'.$id.'"');
		}else
		{
			$query = $this->db->query('UPDATE products SET productname ="'.$name.'", productinfo="'.$info.'", productprice="'.$price.'",producttype="'.$type.'"
			,productcategory="'.$category.'", company="'.$company.'", productquantity="'.$quantily.'", productimages="'.$img.'" WHERE productid="'.$id.'"');
		}
	}
	public function deleteProductById($id)
	{
		$query = $this->db->query('DELETE FROM products WHERE productid = "'.$id.'"');
	}
	public function productByKey($key)
	{
		$query = $this->db->query('SELECT * FROM products WHERE productquantity!=0 AND productname LIKE "%'.$key.'%"');
		return $query->result_array();
	}
	public function showMobile()
	{
		$query = $this->db->query('SELECT * FROM products WHERE productquantity!= 0 AND productcategory = 2 ORDER BY productid DESC LIMIT 20');
		return $query->result_array();
	}
	public function showTablet()
	{
		$query = $this->db->query('SELECT * FROM products WHERE productquantity!= 0 AND productcategory = 3 ORDER BY productid DESC LIMIT 20');
		return $query->result_array();
	}
	public function showPc()
	{
		$query = $this->db->query('SELECT * FROM products WHERE productquantity!= 0 AND productcategory = 1 ORDER BY productid DESC LIMIT 20');
		return $query->result_array();
	}
	public function showTb()
	{
		$query = $this->db->query('SELECT * FROM products WHERE productquantity!= 0 AND productcategory = 4 ORDER BY productid DESC LIMIT 20');
		return $query->result_array();
	}
	public function showCategory($id, $off = 0, $order, $by , $com , $type, $bt1, $bt2)
	{
		if($com == 'all')
		{
			if($type == 'all')
			{
				if($bt1 == 'all' && $bt2 == 'all')
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}else
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND productprice BETWEEN '.$bt1.' AND '.$bt2.' ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}
			}else
			{
				if($bt1 == 'all' && $bt2 == 'all')
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND producttype="'.$type.'" ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}else
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND producttype="'.$type.'" AND productprice BETWEEN '.$bt1.' AND '.$bt2.' ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}
			}
		}else
		{
			if($type == 'all')
			{
				if($bt1 == 'all' && $bt2 == 'all')
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND company="'.$com.'" ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}else
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND company="'.$com.'" AND productprice BETWEEN '.$bt1.' AND '.$bt2.' ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}
			}else
			{
				if($bt1 == 'all' && $bt2 == 'all')
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND company="'.$com.'" AND producttype = "'.$type.'" ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}else
				{
					$query = $this->db->query('SELECT * FROM products T1 INNER JOIN product_categories T2 ON T1.productcategory = T2.pcid WHERE productquantity!= 0 AND productcategory = "'.$id.'" AND company="'.$com.'" AND producttype = "'.$type.'" AND productprice BETWEEN '.$bt1.' AND '.$bt2.' ORDER BY '.$order.' '.$by.' LIMIT '.$off.',20');
				}
			}
		}
		return $query->result_array();
	}
	public function showCompanyByCategory($cid)
	{
		$query = $this->db->query('SELECT cid,cname,COUNT(company) AS count FROM products T1 INNER JOIN company T2 ON T1.company = T2.cid WHERE productcategory = "'.$cid.'" GROUP BY company');
		return $query->result_array();
	}
	public function countProductByCategory($cid) {
        $query = $this->db->query('SELECT * FROM products WHERE productcategory = "'.$cid.'"');
        return $query->num_rows();
    }
    public function allproduct($dateFrom, $dateTo)
    {
    	$line = "SELECT pcname, COUNT(productcategory) AS count  FROM products T1 INNER JOIN product_types T2 ON T1.producttype = T2.ptid
		 INNER JOIN product_categories T3 ON T1.productcategory = T3.pcid
		 INNER JOIN company T4 ON T1.company = T4.cid ";
		if($dateFrom != 0 || $dateTo != 0)
		{
			$dateFrom = date_create($dateFrom);
			$dateFrom = date_format($dateFrom,"Y/m/d");
			$dateTo = date_create($dateTo);
			$dateTo  = date_format($dateTo,"Y/m/d");
			$line .="WHERE datecreated BETWEEN '".$dateFrom."' AND '".$dateTo."'";
		}
		$line .="GROUP BY productcategory";
    	$query = $this->db->query($line);
    	if($query->num_rows > 0)
    	{
	    	$data = $query->result_array();
	    	$newarray = [];
	    	foreach ($data as $key => $value) {
	    		$newarray2 = [];
	    		$newarray2[$value['pcname']] = $value['count'];
	    		array_push($newarray, $newarray2);
	    	}
	    	return $data;
	    }else{
    		return NULL;
	    }
    }
    public function linechart1($dateFrom, $dateTo)
    {
    	$line = "SELECT DATE(datecreated) AS name, COUNT(datecreated) AS data FROM products T1 INNER JOIN product_types T2 ON T1.producttype = T2.ptid INNER JOIN product_categories T3 ON T1.productcategory = T3.pcid INNER JOIN company T4 ON T1.company = T4.cid ";
		if($dateFrom != 0 || $dateTo != 0)
		{
			$dateFrom = date_create($dateFrom);
			$dateFrom = date_format($dateFrom,"Y/m/d");
			$dateTo = date_create($dateTo);
			$dateTo  = date_format($dateTo,"Y/m/d");
			$line .="WHERE datecreated BETWEEN '".$dateFrom."' AND '".$dateTo."'";
		}
		$line .="GROUP BY datecreated";
    	$query = $this->db->query($line);
    	if($query->num_rows > 0)
    	{
	    	$data = $query->result_array();
	    	$newarray = [];
	    	foreach ($data as $key => $value) {
	    		$newarray2 = [];
	    		$newarray2[$value['name']] = $value['data'];
	    		array_push($newarray, $newarray2);
	    	}
	    	return $data;
	    }else
	    {
	    	return NULL;
	    }
    }

}