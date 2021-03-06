<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Track;
use App\Form\TrackType;

class TrackController extends Controller{
    /**
     * @Route("/track/new", name="app_track_new")
     */


     public function new(Request $request)
     {
         $track = new Track();
         $form = $this->createForm(TrackType::class, $track);
         $form->handlRequest($request);

         if ($form->isSubmitted() && $form->isValid()){
             //$track stores the uploaded audio file
             /** @var Symfony_Component\HttpFoundation\File\UploadedFile $track */
             $file = $track->getSong();

             $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

             // choose where the file will be stored
             $file->move(
                 $this->getParameter('tracks_directory'),
                 $fileName
             );

             // make an update on the track to store it's name instead of it's content
             $track->setSong($fileName);

             //.. we then persist the $track variable

             return $this->redirect($this->generateUrl('app_track_list'));
            }
            return $this->render('track/new.html.twig',array ('form' => $form->createView(),));
         }

         /**
          * @return string
          */
          private function generateUniqueFileName()
          {
              // md5() reduces the similarity of files generated by uniqid()
              return md5(uniqid());
          }

     }


    