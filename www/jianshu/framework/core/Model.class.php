<?php
//ģ�������
class Model{
    protected $db; //���ݿ����Ӷ���
    protected $table; //����
    protected $fields = array();  //�ֶ��б�

    public function __construct($table){
        $dbconfig['host'] = $GLOBALS['config']['host'];
        $dbconfig['user'] = $GLOBALS['config']['user'];
        $dbconfig['password'] = $GLOBALS['config']['password'];
        $dbconfig['dbname'] = $GLOBALS['config']['dbname'];
        $dbconfig['port'] = $GLOBALS['config']['port'];
        $dbconfig['charset'] = $GLOBALS['config']['charset'];

        $this->db = new Mysql($dbconfig);
        $this->table =  $table;

        //����getFields�ֶ�
        $this->getFields();
    }

    /**
     * ��ȡ���ֶ��б�
     *
     */
    private function getFields(){
        $sql = "DESC ". $this->table;
        $result = $this->db->getAll($sql)[0];
        foreach ($result as $v) {
            $this->fields[] = $v['Field'];
            if ($v['Key'] == 'PRI') {
                //������������Ļ������䱣�浽����$pk��
                $pk = $v['Field'];
            }
        }
        //�������������������뵽�ֶ��б�fields��
        if (isset($pk)) {
            $this->fields['pk'] = $pk;
        }
    }

    /**
     * �Զ������¼
     * @access public
     * @param $list array ��������
     * @return mixed �ɹ����ز����id��ʧ���򷵻�false
     */
    public function insert($list){
        $field_list = '';  //�ֶ��б��ַ���
        $value_list = '';  //ֵ�б��ַ���
        foreach ($list as $k => $v) {
            if (in_array($k, $this->fields)) {
                $field_list .= "`".$k."`" . ',';
                $value_list .= "'".$v."'" . ',';
            }
        }
        //ȥ���ұߵĶ���
        $field_list = rtrim($field_list,',');
        $value_list = rtrim($value_list,',');
        //����sql���
        $sql = "INSERT INTO `{$this->table}` ({$field_list}) VALUES ($value_list)";

        if ($this->db->exec($sql)) {
            # ����ɹ�,����������ļ�¼id
            return $this->db->getInsertId();
            //return true;
        } else {
            # ����ʧ�ܣ�����false
            return false;
        }

    }

    /**
     * �Զ����¼�¼
     * @access public
     * @param $list array ��Ҫ���µĹ�������
     * @return mixed �ɹ�������Ӱ��ļ�¼������ʧ�ܷ���false
     */
    public function update($list){
        $uplist = ''; //�����б��ַ���
        $where = 0;   //��������,Ĭ��Ϊ0
        foreach ($list as $k => $v) {
            if (in_array($k, $this->fields)) {
                if ($k == $this->fields['pk']) {
                    # �������У���������
                    $where = "`$k`=$v";
                } else {
                    # �������У���������б�
                    $uplist .= "`$k`='$v'".",";
                }
            }
        }
        //ȥ��uplist�ұߵ�
        $uplist = rtrim($uplist,',');
        //����sql���
        $sql = "UPDATE `{$this->table}` SET {$uplist} WHERE {$where}";
        $result = $this->db->exec($sql);
        if ($result) {
            # �ɹ������ж���Ӱ��ļ�¼��
            if ($rows = $result) {
                # ����Ӱ��ļ�¼��
                return $rows;
            } else {
                # û����Ӱ��ļ�¼����û�и��²���
                return false;
            }
        } else {
            # ʧ�ܣ�����false
            return false;
        }

    }

    /**
     * �Զ�ɾ��
     * @access public
     * @param $pk mixed ����Ϊһ�����ͣ�Ҳ����Ϊ����
     * @return mixed �ɹ�����ɾ���ļ�¼����ʧ���򷵻�false
     */
    public function delete($pk){
        $where = 0; //�����ַ���
        //�ж�$pk�����黹�ǵ�ֵ��Ȼ������Ӧ������
        if (is_array($pk)) {
            # ����
            $where = "`{$this->fields['pk']}` in (".implode(',', $pk).")";
        } else {
            # ��ֵ
            $where = "`{$this->fields['pk']}`=$pk";
        }
        //����sql���
        $sql = "DELETE FROM `{$this->table}` WHERE $where";
        $result = $this->db->exec($sql);
        if ($result) {
            # �ɹ������ж���Ӱ��ļ�¼��
            if ($rows = $result) {
                # ����Ӱ��ļ�¼
                return $rows;
            } else {
                # û����Ӱ��ļ�¼
                return false;
            }
        } else {
            # ʧ�ܷ���false
            return false;
        }
    }

    /**
     * ͨ��������ȡ��Ϣ
     * @param $pk int ����ֵ
     * @return array ������¼
     */
    public function selectByPk($pk){
        $sql = "select * from `{$this->table}` where `{$this->fields['pk']}`=$pk";
        return $this->db->getRow($sql);
    }

    /**
     * ��ȡ�ܵļ�¼��
     * @param string $where ��ѯ��������"id=1"
     * @return number ���ز�ѯ�ļ�¼��
     */
    public function total($where){
        if(empty($where)){
            $sql = "select count(*) from {$this->table}";
        }else{
            $sql = "select count(*) from {$this->table} where $where";
        }
        return $this->db->getOne($sql);
    }

    /**
     * ��ҳ��ȡ��Ϣ
     * @param $offset int ƫ����
     * @param $limit int ÿ��ȡ��¼������
     * @param $where string where����,Ĭ��Ϊ��
     */
    public function pageRows($offset, $limit,$where = ''){
        if (empty($where)){
            $sql = "select * from {$this->table} limit $offset, $limit";
        } else {
            $sql = "select * from {$this->table}  where $where limit $offset, $limit";
        }

        return $this->db->getAll($sql);
    }

}