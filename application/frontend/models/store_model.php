<?php 
class store_model extends CI_Model {
var $user_table = 'ugk_stores'; 
 
    function __construct()
    {
        parent::__construct();
    }
	
	/************************************************* Store functions starts **************************************************/	
		
	function getStoreData($searchdata=array(),$recordperpage="",$startlimit="")
	{
		
		$searcharray=array("status"=>"store_status","category"=>"store_category","experience"=>"store_experience","location"=>"store_country","plans"=>"store_current_plan");
		$this->db->select('*,ugk_stores.id as store_id');
		$this->db->from('ugk_stores');
		$this->db->join('ugk_countries', 'ugk_countries.id = ugk_stores.store_country');
		$this->db->join('ugk_store_category', 'ugk_store_category.id = ugk_stores.store_category');
		$this->db->join('ugk_store_experience', 'ugk_store_experience.id = ugk_stores.store_experience');
		$this->db->join('ugk_store_plans', 'ugk_store_plans.id = ugk_stores.store_current_plan');
		if(count($searchdata)!=0)
		{		
			foreach($searchdata as $key=>$val)
			{
				if(isset($searcharray[$key]) && $searchdata[$key]!="")
				{
					if(array_key_exists($key,$searcharray))
					{
						$where=array($searcharray[$key]=>$val);
						$this->db->where($where);
					}
				}
			}		
		}
		
		if(isset($searchdata["search"]) && $searchdata["search"]!="Search" && $searchdata["search"]!="")
		{
			$this->db->like('ugk_stores.store_name', $searchdata["search"]);
		}
		$where=array('store_status <> '=>'4');
		$this->db->where($where);
		if($recordperpage!="" && $startlimit!="")
		{
			$this->db->limit($recordperpage,$startlimit);
		}
		$query = $this->db->get();
		$resultset=$query->result_array();
		return $resultset;
	}
	
	function getIndividualStoreData($storeid)
	{
		$this->db->select('*,ugk_stores.id as store_id');
		$this->db->from('ugk_stores');
		$this->db->join('ugk_countries', 'ugk_countries.id = ugk_stores.store_country');
		$this->db->join('ugk_store_category', 'ugk_store_category.id = ugk_stores.store_category');
		$this->db->join('ugk_store_experience', 'ugk_store_experience.id = ugk_stores.store_experience');
		$this->db->join('ugk_store_plans', 'ugk_store_plans.id = ugk_stores.store_current_plan');
		$where=array('store_status <> '=>'4',"ugk_stores.id"=>$storeid);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		return $resultset;
	}
	
	function archive_store($store_id)
	{
		$where=array("id"=>$store_id);
		$array=array("store_status"=>4);
		$this->db->where($where);
		$this->db->update("ugk_stores",$array);		
	}
	
	public function enable_disable_store($storeid,$status)
	{
		$this->db->where("id",$storeid);
		$array=array("store_status"=>$status);
		$this->db->update("ugk_stores",$array);	
	}
	
	
	public function add_edit_store($storearray)
	{
		if($storearray["id"]=="")
		{
			return $this->db->insert("ugk_stores",$storearray);	
		}
		else
		{
			
			$this->db->where("id",$storearray["id"]);
			return $this->db->update("ugk_stores",$storearray);				
			
		}
	}	
	
	/************************************************* Store function ends **************************************************/
	
	/************************************************* Category function starts **************************************************/
	public function enable_disable_category($categoryid,$status)
	{
		$this->db->where("id",$categoryid);
		$array=array("store_category_status"=>$status);
		$this->db->update("ugk_store_category",$array);		
	}
	
	function archive_category($category_id)
	{
		$where=array("id"=>$category_id);
		$array=array("store_category_status"=>4);
		$this->db->where($where);
		$this->db->update("ugk_store_category",$array);		
		$where=array("store_category"=>$category_id);
		$array=array("store_status"=>4);
		$this->db->where($where);
		$this->db->update("ugk_stores",$array);	
	}
	
	
	public function getStoreCategory($searcharray=array(),$type="",$recordperpage="",$startlimit="")

	{
		$this->db->select('*');
		$this->db->from('ugk_store_category');
		if($type=="activated")
		{
			$where=array("store_category_status"=>"1");
			$this->db->where($where);
		}
			
		if($recordperpage!="" || $startlimit!="")
		{
			$this->db->limit($recordperpage,$startlimit);
		}
		if(isset($searcharray["search"]) && $searcharray["search"]!="" && $searcharray["search"]!="search")
		{
			$this->db->like("ugk_store_category.store_category_name",$searcharray["search"]);	
		}
		$where=array("store_category_status <> "=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->result_array();
		return $resultset;
			
	}
	
	public function getIndividualCategory($categoryid)
	{
		$this->db->select("*");	
		$this->db->from('ugk_store_category');
		$where=array("id"=>$categoryid,"store_category_status <> "=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		return $resultset;
	}
	
	public function add_edit_category($categoryarray)
	{
		if($categoryarray["id"]=="")
		{
			return $this->db->insert("ugk_store_category",$categoryarray);	
		}	
		else
		{
			$this->db->where("id",$categoryarray["id"]);
			return $this->db->update("ugk_store_category",$categoryarray);	
		}
	}
	
	/************************************************* Category function ends **************************************************/
	
	/************************************************* Location function starts **************************************************/
	
	public function getStoreCountries($searcharray=array(),$type="",$recordperpage="",$startlimit="")
	{
		$this->db->select('*');
		$this->db->from('ugk_countries');
		if($type=="activated")
		{
			$where=array("status"=>"1");
			$this->db->where($where);
		}
			$where=array("status <> "=>"4");
			$this->db->where($where);
		if($recordperpage!="" || $startlimit!="")
		{
			$this->db->limit($recordperpage,$startlimit);
		}
		if(isset($searcharray["search"]) && $searcharray["search"]!="" && $searcharray["search"]!="search")
		{
			$this->db->like("ugk_countries.country_name",$searcharray["search"]);	
		}
		$query = $this->db->get();
		$resultset=$query->result_array();
		return $resultset;
	}
	
	public function enable_disable_locations($locationid,$status)
	{
		$this->db->where("id",$locationid);
		$array=array("status"=>$status);
		$this->db->update("ugk_countries",$array);		
	}
	

	
	/************************************************* Location function ends **************************************************/
	
	/************************************************* Experience function starts **************************************************/
	public function enable_disable_experience($categoryid,$status)
	{
		$this->db->where("id",$categoryid);
		$array=array("status"=>$status);
		$this->db->update("ugk_store_experience",$array);		
	}
	
	function archive_experience($category_id)
	{
		$where=array("id"=>$category_id);
		$array=array("status"=>4);
		$this->db->where($where);
		$this->db->update("ugk_store_experience",$array);
		$where=array("store_experience"=>$category_id);
		$array=array("store_status"=>4);
		$this->db->where($where);
		$this->db->update("ugk_stores",$array);		
	}
	
	public function getStoreExperience($searcharray=array(),$type="",$recordperpage="",$startlimit="")
	{
		$this->db->select('*');
		$this->db->from('ugk_store_experience');
		if($type=="activated")
		{
			$where=array("status"=>"1");
			$this->db->where($where);
		}
			$where=array("status <> "=>"4");
			$this->db->where($where);
		if($recordperpage!="" || $startlimit!="")
		{
			$this->db->limit($recordperpage,$startlimit);
		}
		if(isset($searcharray["search"]) && $searcharray["search"]!="" && $searcharray["search"]!="search")
		{
			$this->db->like("ugk_store_experience.experience",$searcharray["search"]);	
		}
		$query = $this->db->get();
		$resultset=$query->result_array();
		return $resultset;
			
	}
	
	public function getIndividualexperience($experienceid)
	{
		$this->db->select("*");	
		$this->db->from('ugk_store_experience');
		$where=array("id"=>$experienceid,"status <> "=>"4");
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		return $resultset;
	}
	
	public function add_edit_experience($experiencearray)
	{
		if($experiencearray["id"]=="")
		{
			return $this->db->insert("ugk_store_experience",$experiencearray);	
		}	
		else
		{
			$this->db->where("id",$experiencearray["id"]);
			return $this->db->update("ugk_store_experience",$experiencearray);	
		}
	}
	
	/************************************************* Category function ends **************************************************/
	
	/************************************************* Plan function starts **************************************************/
	
	public function getStorePlans($searcharray=array())
	{
		$this->db->select('*');
		$this->db->from('ugk_store_plans');
		if(isset($searcharray["type"]) && $searcharray["type"]=="activated")
		{
			$where=array("plan_status"=>"1");
			$this->db->where($where);
		}
		if(isset($searcharray["search"]) && $searcharray["search"]!="search" && $searcharray["search"]!="")
		{
			$where=array("plan_name"=>$searcharray["search"]);
			$this->db->like($where);	
		}
		$where=array('plan_status <> '=>'4');
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->result_array();
		return $resultset;
	}
	
	public function getIndividualPlandata($planid)
	{
		$this->db->select('*');
		$this->db->from('ugk_store_plans');
		$where=array('plan_status <> '=>'4','id'=>$planid);
		$this->db->where($where);
		$query = $this->db->get();
		$resultset=$query->row_array();
		return $resultset;	
	}
	
	public function enable_disable_plan($planid,$status)
	{
		$this->db->where("id",$planid);
		$array=array("plan_status"=>$status);
		$this->db->update("ugk_store_plans",$array);	
	}
	
	public function archive_plan($planid)
	{
		$where=array("id"=>$planid);
		$array=array("plan_status"=>4);
		$this->db->where($where);
		$this->db->update("ugk_store_plans",$array);	
	}
	
	public function add_edit_plan($arr)
	{
		if($arr["id"]=="")
		{
			$planbasicinfo["plan_name"]=$arr["plan_name"];
			$planbasicinfo["number_of_products"]=$arr["number_of_products"];
			$planbasicinfo["number_of_images"]=$arr["number_of_images"];
			$planbasicinfo["number_of_staffusers"]=$arr["number_of_staffusers"];
			$planbasicinfo["memory_usage"]=$arr["memory_usage"];
			$planbasicinfo["time_period"]=$arr["time_period"];
			$planbasicinfo["amount"]=$arr["amount"];
			$planbasicinfo["admin_commision"]=$arr["admin_commision"];
			if($this->db->insert("ugk_store_plans",$planbasicinfo))
			{
				$planid=$this->db->insert_id();		
				foreach($arr["chkpayment"] as $key=>$val)
				{
					$paymentinfo["plan_id"]=$planid;
					$paymentinfo["payment_id"]=$val;
					$this->db->insert("ugk_payment_plan",$paymentinfo);	
				}
				foreach($arr["chkshipping"] as $key=>$val)
				{
					$shippinginfo["plan_id"]=$planid;
					$shippinginfo["shipping_id"]=$val;
					$this->db->insert("ugk_shipping_plan",$shippinginfo);	
				}
				$err=0;
			}
			else
			{
				$err=1;	
			}
		}
		else
		{
			$planbasicinfo["id"]=$arr["id"];
			$planbasicinfo["plan_name"]=$arr["plan_name"];
			$planbasicinfo["number_of_products"]=$arr["number_of_products"];
			$planbasicinfo["number_of_images"]=$arr["number_of_images"];
			$planbasicinfo["number_of_staffusers"]=$arr["number_of_staffusers"];
			$planbasicinfo["memory_usage"]=$arr["memory_usage"];
			$planbasicinfo["time_period"]=$arr["time_period"];
			$planbasicinfo["amount"]=$arr["amount"];
			$this->db->where("id",$planbasicinfo["id"]);
			if($this->db->update("ugk_store_plans",$planbasicinfo))
			{
				$this->db->where(array("plan_id"=>$planbasicinfo["id"]));
				$this->db->delete("ugk_payment_plan");	
				$this->db->where(array("plan_id"=>$planbasicinfo["id"]));
				$this->db->delete("ugk_shipping_plan");
				foreach($arr["chkpayment"] as $key=>$val)
				{
					$paymentinfo["plan_id"]=$planbasicinfo["id"];
					$paymentinfo["payment_id"]=$val;
					$this->db->insert("ugk_payment_plan",$paymentinfo);	
				}
				foreach($arr["chkshipping"] as $key=>$val)
				{
					$shippinginfo["plan_id"]=$planbasicinfo["id"];
					$shippinginfo["shipping_id"]=$val;
					$this->db->insert("ugk_shipping_plan",$shippinginfo);	
				}	
				$err=0;
			}
			else
			{
				$err=1;	
			}
		}
		
		if($err==1)
		{
			return false;
		}
		else 
		{
			return true;	
		}
	}
	
	public function getPlanShippingMethods($planid)
	{
		$this->db->select("*");
		$this->db->from("ugk_store_plans");
		$this->db->join("ugk_shipping_plan","ugk_shipping_plan.plan_id=ugk_store_plans.id");
		$this->db->join("ugk_shipping_methods","ugk_shipping_plan.shipping_id=ugk_shipping_methods.id");
		$this->db->where(array("ugk_store_plans.id"=>$planid));
		$this->db->where(array("ugk_shipping_methods.method_status"=>"1"));
		$query=$this->db->get();
		$result=$query->result_array();
		return $result;	
	}
	
	public function getPlanPaymentMethods($planid)
	{
		$this->db->select("*");
		$this->db->from("ugk_store_plans");
		$this->db->join("ugk_payment_plan","ugk_payment_plan.plan_id=ugk_store_plans.id");
		$this->db->join("ugk_payment_methods","ugk_payment_methods.id=ugk_payment_plan.payment_id");
		$this->db->where(array("plan_status <> "=>4,"plan_id"=>$planid,"ugk_payment_methods.method_status"=>1));
		$this->db->where(array("ugk_store_plans.id"=>$planid));
		$this->db->where(array("ugk_payment_methods.method_status"=>"1"));
		$query=$this->db->get();
		$result=$query->result_array(array("plan_status <> "=>4,"plan_id"=>$planid));
		return $result;	
	}
	
	public function setStoreSubscribedPlan($dataarr)
	{
		$result = $this->db->insert('ugk_store_subscribed_plans',$dataarr);
		if($result)
		{
			return true;	
		}
		else
		{
			return false;				
		}
	}
	
	public function getStoreSubscribedPlan($store_id,$plan_id)
	{
		$this->db->select("*");
		$this->db->from("ugk_store_subscribed_plans");
		$this->db->where(array("store_id" => $store_id,"plan_id" => $plan_id));
		$this->db->order_by("id", "desc");
		$this->db->limit(0,1);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	
	public function setStoresUpdatedPlan($storearr)
	{
		$data["id"] = $storearr["id"];
		$data["store_current_plan"] = $storearr["store_current_plan"];
		$data["renewal_date"] = $storearr["renewal_date"];
		$data["store_plan_status"] = $storearr["store_plan_status"];
		$thid->db->where(array("id"=>$data["id"]));
		if($this->db->update("ugk_stores",$data))
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	/************************************************* Plan function ends **************************************************/
	
}