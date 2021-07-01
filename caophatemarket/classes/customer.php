<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_binhluan( $customer_id){
			$product_id = $_POST['product_id_binhluan'];
			$customer_id = $customer_id;
			$comment = $_POST['binhluan'];
			if($comment==''){
				$alert = "<span class='error'>Please leave a comment</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_comment(product_id,customer_id,comment,status) VALUES('$product_id','$customer_id','$comment',0)";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Bình luận đã gửi</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Bình luận không thành công</span>";
						return $alert;
				}
			}
		}
		public function del_comment($id){
			$query = "DELETE FROM tbl_comment where id = '$id'";
			$result = $this->db->delete($query);
			
		}
		public function show_comment($product_id){
			$query = "SELECT tbl_comment.*, tbl_customer.name FROM tbl_comment INNER JOIN tbl_customer ON tbl_comment.customer_id = tbl_customer.id WHERE product_id = $product_id AND status = 1 order by id desc";
			$result = $this->db->select($query);
			return $result;			
		}

		public function show_all_comment(){
			$query = "SELECT tbl_comment.*, tbl_customer.name, tbl_product.productName FROM tbl_comment 
					  INNER JOIN tbl_customer ON tbl_comment.customer_id = tbl_customer.id
					  INNER JOIN tbl_product ON tbl_comment.product_id = tbl_product.productId 
					  order by id desc";
			$result = $this->db->select($query);
			return $result;			
		}

		public function approve_comment($id){
			$query = "UPDATE tbl_comment SET status = 1 WHERE id ='$id'";
			$result = $this->db->insert($query);
			return $result;	
		}
		
		public function insert_customers($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);
			if($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone =="" || $password ==""){
				$alert = "<span style='color:red; font-size:13px;'>Fields must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span style='color:red; font-size:13px;'>Email Already Existed ! Please Enter Another Email</span>";
					return $alert;
				}else{
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$password')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span style='color:green; font-size:13px;'>Customer Created Successfully</span>";
						return $alert;
					}else{
						$alert = "<span style='color:red; font-size:13px;'>Customer Created Not Successfully</span>";
						return $alert;
					}
				}
			}
		}
		public function login_customers($data){
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);
			if($email=='' || $password==''){
				$alert = "<span style='color:red; font-size:13px;'>Password and Email must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
				$result_check = $this->db->select($check_login);
				if($result_check){

					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id']);
					Session::set('customer_name',$value['name']);
					$login_check = Session::get('login_cart'); 
					if($login_check){
						header('Location:?page=cart&action=cart');
						unset($_SESSION['login_cart']);
					} else header('Location:?page=home');
					
						
				}else{
					$alert = "<span style='color:red; font-size:13px;'>Email or Password doesn't match</span>";
					return $alert;
				}
			}
		}
		public function show_customers($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span style='color:red; font-size:13px;'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span style='color:green; font-size:13px;' >Customer Updated Successfully</span>";
						return $alert;
				}else{
						$alert = "<span style='color:red; font-size:13px;'>Customer Updated Not Successfully</span>";
						return $alert;
				}
				
			}
		}
		
		


	}
?>