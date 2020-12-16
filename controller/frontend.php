<?php
use model\MemberManager as MemberManager;
use model\VideoManager as VideoManager;

// registration, connection

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

// videos

function listVideos()
{
    $videoManager = new VideoManager(); 
    $videos = $videoManager->getVideos(); 
 
  return $videos;

}

// function video()
// {
//     $videoManager = new videoManager();
//     $video = $videoManager->getvideo($_GET['id']);



//     // require('view/frontend/videoView.php');
// }

// function newvideo()
// {
//     $addvideoManager = new videoManager();

//     $addvideo = $addvideoManager->addvideo();

//     return $addvideo;
// }

// function removevideo($videoId)
// {
//     $removevideoManager = new videoManager();

//     $removevideo = $removevideoManager->suppressvideo($videoId);

//     return $removevideo;

// }

//boutons
// function approve($commentId)
// {
//     $commentManager = new CommentManager();
//     $approve = $commentManager->approbationCommentaire($commentId); 
// }

// function suppress($commentId)
// {
//     $commentManager = new CommentManager();
//     $suppress = $commentManager->suppressionCommentaire($commentId); 
// }