<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_model extends CI_Model {


    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */



   function viewTopInvestors(){
		$this->db->select('*');
		$this->db->from('lxx_balance');
		$this->db->join('user_register','lxx_balance.user_id = user_register.id');
		$this->db->order_by('lxx_balance.lxx_bal', 'desc');
		$this->db->limit(10);
		$result = $this->db->get();
		return $result ->result();
	}
	function viewTopInvestors1(){
		$this->db->select('lxx_balance.user_id, user_register.username, (lxx_balance.lxx_bal + lxx_balance.stake_bal) as cust_balance');
		$this->db->from('lxx_balance');
		$this->db->join('user_register','lxx_balance.user_id = user_register.id');

		$this->db->order_by('cust_balance', 'desc');
		$this->db->limit(10);
		$result = $this->db->get();
		return $result ->result();
	}




    function getUserRoles() {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();

        return $query->result();
    }

	//------------------------Transaction ID Submit---------------\\\


  function checkIfWireAdress($username){
        $address =$this->db->get_where('airdrop',array('username' => $username));
        if($address->num_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }


	function Transaction_id($data){
        if($this->db->insert("transaction_ids",$data)){
            return true;
        }else{
            return false;
        }

    }




	/*-------------------AFFILIATES------------------------*/


	  function viewUsersAffiliates($referral){
        $this->db->from("user_register");
        $this->db->where('referral', $referral);
        $this->db->order_by('id', 'desc');
        $result = $this->db->get();
        return $result ->result();
    }

    function viewUsersAffiliatesBonus($ids){
		$this->db->select('*');
		$this->db->from('user_register');
		$this->db->join('lxx_balance','lxx_balance.user_id = user_register.id','left');
		$this->db->where_in('user_register.id', $ids);
		$this->db->order_by('user_register.id', 'desc');
		$result = $this->db->get();
		return $result ->result();
	}


	function AffiliatesBonusSum($ids){
		$this->db->select_sum('lxx_balance.lxx_main_bal');
		$this->db->from('user_register');
		$this->db->join('lxx_balance','lxx_balance.user_id = user_register.id','left');
		$this->db->where_in('user_register.id', $ids);
		$this->db->order_by('user_register.id', 'desc');
		$result = $this->db->get();
		return $result ->result();
	}



      /*-------------------AFFILIATES END------------------------*/



    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email) {
        $this->db->select("email");
        $this->db->from("user_register");
        $this->db->where("email", $email);

        $query = $this->db->get();

        return $query->result();
    }

    function checkUsernameExists($email) {
        //$this->db->select("username");
        $this->db->from("user_register");
        $this->db->where("username", $email);

        $query = $this->db->get();

        return $query->result();
    }

     /**
     * This function is used to add Users Transaction ID
     * @return number $insert_id : This is last inserted id
     */

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo) {
        $this->db->trans_start();
        $this->db->insert('user_register', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId) {
        $this->db->from('user_register');

        $this->db->where('id', $userId);

        $query = $this->db->get();

        return $query->result();
    }

    function getUserInfoByEmail($userId) {
        $this->db->from('user_register');

        $this->db->where('email', $userId);
        $this ->db->or_where("username",$userId);
        $query = $this->db->get();

        return $query->result();
    }


    function viewReferralsByUser($username){

        $this->db->from('register');

        $this->db->where('referral', $username);

        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId) {
        $this->db->where('username', $userId);
        $res = $this->db->update('user_register', $userInfo);
        return $res;
    }

    function editUserByEmail($userInfo, $email) {
        $this->db->where('email', $email);
        $res = $this->db->update('user_register', $userInfo);
        return $res;
    }

    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo) {
        $this->db->where('id', $userId);
        $this->db->delete('user_register', $userInfo);

        return $this->db->affected_rows();
    }

    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword) {
        $this->db->select('username, password');
        $this->db->where('id', $userId);
        $query = $this->db->get('user_register');
        $user = $query->result();
        print_r($user);
        if (!empty($user)) {
            if (verifyHashedPassword($oldPassword, $user[0]->password)) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo) {
        $this->db->where('id', $userId);
        $this->db->update('user_register', $userInfo);

        return $this->db->affected_rows();
    }

    function viewRegistrations($status) {
        $this->db->from("user_register");
        $this->db->where("activate_status !=", $status);
        $query = $this->db->get();
        return $query->result();
    }

    function viewRegistrations1($status) {
        $this->db->from("user_register");
        $this->db->where("active_status", $status);
        $query = $this->db->get();
        return $query->result();
    }

    function countRegistrations($status) {
        $result = $this->viewRegistrations1($status);
        if ($result) {
            return count($result);
        } else {
            return 0;
        }
    }

	function update2FA($data,$userId){
        $this->db->where('id', $userId);
        $this->db->update('user_register', $data);

        return $this->db->affected_rows();

     }

    public function checkedIfSwap(){
    $status = $this->db->get_where('lxx_balance',array('user_id' =>$this->session->userdata('userId'),'status'=>1));
    if($status->num_rows > 0){
      return 1;
    }else {
      return 0;
    }
   }


}
