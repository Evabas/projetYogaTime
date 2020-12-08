<?php

// Chargement des classes

require_once('./model/MemberManager.php');

function member()
{
    $memberManager = new MemberManager();

    $member = $memberManager->getMember();
    
    return $member;

}

function newMember()
{
    $newMemberManager = new MemberManager();

    $newMember= $newMemberManager->createMember();

    return $newMember;
   
}

function pseudoExist()
{
    $pseudoExistManager = new MemberManager();

    $pseudoExist = $pseudoExistManager->existantPseudo();

    return $pseudoExist;
}

