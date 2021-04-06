<?php
    function loadUsers($path){
        $users = [];
        $file = fopen($path, "r");
        if( $file === false ){
            die("ERROR: open file");
        }
        while(($line = fgets($file)) !== false){
            $unserialized_user = unserialize($line);
            $users[] = $unserialized_user;

        }
        
        fclose($file);
        return $users;
    }
    function saveUsers($path, $users){
        $file = fopen($path, "w");
        if($file === false){
            die("HIBA fájl megnyitása során");
        }
        foreach ($users as $user) {
            $serialized_user = serialize($user);
            fputs($file, $serialized_user . "\n");
        }
        fclose($file);
    }  
?>