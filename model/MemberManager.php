<?php

require __DIR__ . '/Manager.php';

class MemberManager extends Manager
{
    public function getMember()
    {
        $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
        $db = $this->dbConnect();
        $requser = $db->prepare("SELECT * FROM membres, groupes WHERE pseudo = :pseudo AND id_groupe=groupes.id ");
            $requser->execute(array(
            'pseudo' => $pseudoconnect));
            $resultat = $requser->fetch();
        return $resultat;
    }
    public function createMember()
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd = htmlspecialchars($_POST['pwd']);
        $mail = htmlspecialchars($_POST['mail']);
        $db = $this->dbConnect();
        $pass_hache = password_hash($pwd, PASSWORD_DEFAULT); 
        $req = $db->prepare('INSERT INTO membres(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');
                $req->execute(array(
                'pseudo' => $pseudo,
                'pass' => $pass_hache,
                'email' => $mail)); 
        return $req;
    }
    public function existantPseudo()
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd = htmlspecialchars($_POST['pwd']);
        $pwd2 = htmlspecialchars($_POST['pwd2']);
        $mail = htmlspecialchars($_POST['mail']);
                
        $db = $this->dbConnect();
        $reqpseudo = $db->prepare('SELECT * FROM membres WHERE pseudo = ?');
        $reqpseudo->execute(array($pseudo));
        $pseudoexist = $reqpseudo-> rowCount();  
        
        return $pseudoexist;
    }
}