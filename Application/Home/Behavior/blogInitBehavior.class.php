<?php
    namespace Home\Behavior;
    class blogInitBehavior{
        public function run(&$param){
            $q=q("SELECT * FROM `blog_setting` ");
            while($rs=$q->fetch()){
                C($rs["key"],$rs["value"]);
            }
        }
    }