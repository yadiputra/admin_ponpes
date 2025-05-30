<?php 

class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

	public function view_2($table, $data){
		$this->db->distinct();
		$this->db->select($data);
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }
	
	public function update_2($table, $set, $data, $where, $id){
        return $this->db->query("UPDATE $table SET $set=$set+$data where $where=$id");
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }
	
	public function view_where_in($table,$field,$data){
        $this->db->where_in($field, $data);
        return $this->db->get($table);
    }
	
	
	public function view_where_jum($table,$table2,$field,$data){
		$this->db->select('count(id_produk) as jum');
		$this->db->join($table2, $table.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($data);
        return $this->db->get($table);
    }
	
	public function view_where2($table,$data,$data1){
        $this->db->where($data);
        $this->db->where($data1);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
	
	public function view_ordering_group($table,$table2,$field,$select,$where,$view){
        $this->db->select($select);
		$this->db->join($table2, $table.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->group_by($view);
        return $this->db->get($table);
    }

    public function view_where_ordering_limit($table,$data,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }
	
	public function view_where_get($table,$data){
        $this->db->where($data);
		$this->db->order_by('id','DESC');
        $query = $this->db->get($table);
		if($query->num_rows()<1){
			return 3;
		}
		else{
			return $query->row_array();
		}
    }
	
	public function view_limit_data($table,$dari){
        $this->db->select('*');
		$this->db->order_by('kod','DESC');
        $this->db->limit($dari);
		$this->db->where(array('status'=>'1'));
        return $this->db->get($table);
    }
	
	public function view_ordering_limit_data1($table,$order,$ordering,$data,$where,$dari,$baris){
        $this->db->select($data);
		$this->db->where($where);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
	public function view_data($table,$order,$ordering,$data,$where){
        $this->db->select($data);
		$this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get($table);
    }

}