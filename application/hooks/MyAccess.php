<?php
class Access{
    public $CI;
    public function __construct(){
        $this->CI =& get_instance();
    }
    public function start(){
        $this->CI->zend->load('Zend_Acl');
        $this->setRoles();
        $this->setResources();
        $this->setAccess();
        $module = $this->CI->router->fetch_module();
        $controller = $this->CI->router->fetch_class();
        $action = $this->CI->router->fetch_method();
        $level = $this->CI->session->userdata('ses_level');
        $role = 'mq';
        switch($level){
            case '1':
                $role = 'mq';
                break;
            case '2':
                $role = 'admincp';
                break;
        }
        if(!$this->CI->Zend_Acl->isAllowed($role, $module . ':' . $controller, $action)){
            redirect(base_url() . 'mq/index');
        }
    }
    public function setRoles(){
        $this->CI->Zend_Acl ->addRole(new Zend_Acl_Role('guest'))
                            ->addRole(new Zend_Acl_Role('mq'), 'guest')
                            ->addRole(new Zend_Acl_Role('admincp'), 'mq');
    }
    public function setResources(){
        $this->CI->Zend_Acl ->add(new Zend_Acl_Resource('admincp'))
                            ->add(new Zend_Acl_Resource('admincp:index'), 'admincp')
                            ->add(new Zend_Acl_Resource('admincp:addbook'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:addcategory'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:adddonhang'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:addhoadon'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:addnews'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:adduser'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:editbook'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:editcategory'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:editdonhang'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:editnews'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:edituser'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:listbook'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:listcategory'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:listdonhang'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:listnews'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:listuser'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:listhoadon'), 'admincp')
							->add(new Zend_Acl_Resource('admincp:login'), 'admincp')
                            ->add(new Zend_Acl_Resource('mq'))
                            ->add(new Zend_Acl_Resource('mq:index'), 'mq')
							->add(new Zend_Acl_Resource('mq:books'), 'mq')
							->add(new Zend_Acl_Resource('mq:user'), 'mq')
							->add(new Zend_Acl_Resource('mq:search'), 'mq')
							->add(new Zend_Acl_Resource('mq:cart'), 'mq');
                           
    }
    public function setAccess(){
        $this->CI->Zend_Acl ->allow('guest')
                            ->allow('mq')
                            ->allow('admincp');
    }
}