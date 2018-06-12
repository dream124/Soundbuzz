<?php

namespace App\Controller ;

use Soundbuzz\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sension\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Picture controller.
 * @Route("picture")
 */
class PictureController extends Controller {
/**
 * Picture controller.
 * @Route("/new", name="picture_new")
 * @Method({"GET", "POST"})
 */
public function newAction(Request $request) {
    $picture = new Picture();
    $form = $this->createForm('UserBundle\Form\PictureType',$picture);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
        $file = $picture->getTrackPic();
        if($file instanceof UploadedFile){
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('track_pic_directory'),$fileName);

        }
        $picture->setTrackPic($track_pic);
        $em = $this->getDoctrine()->getManager();
        $em->persist($picture);
        $em->flush();

        return $this->redirectToRoute('picture_show', array('id'=> $picture->getId()));
    }
    return $this->render('picture/new.html.twig', array(
        'picture' => $picture,
        'form' => $form->createView(),
    ));
}

/**
 * Display a form to edit an existing picture entity
 * 
 * @Route("/{id}/edit", name="picture_edit")
 * @Method({"GET", "POST"})
 *//*
public function editAction(Request $request, Picture $picture)
{
    $deleteForm = $this->createDeleteFrom($picture);
    $editForm = $this->createForm('Soundbuzz\PictureForm', $picture);
    $editForm->handleRequest($request);

    if ($editForm->isSubmitted() && $editForm->isValid()){
         // $file stores the oploaded PDF file
         /** @var Symfony\Component\HttpFoundation\UploadedFile $file */
       /*  $file = $picture->getTrackPic();

         $filename = md5(uniqId()).'.'.$file->guessExtension();
         $file->move($this->getParameter('picture_directory'), $fileName);
         $picture->setTrackPic($track_pic);
         $this->getDoctrine()->getManager()->flush();
         return $this->redirectionToRoute('picture_show',array('id'=> $picture->getId()));
    }
    return $this->render('picture/edit.html.twig',array(
        'picture' => $picture,
        'edit_form'=> $editForm->createView(),
        'delete_form'=> $deleteForm->createView(),
    ));
}*/

}