<?php

namespace App\Controller\Admin;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/student')]
class StudentController extends AbstractController
{
    #[Route('/', name: 'admin_student_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $students = $em->getRepository(Student::class)->findAll();
        
        return $this->render('admin/student/index.html.twig', [
            'students' => $students
        ]);
    }

    #[Route('/add', name: 'admin_student_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($student);
            $em->flush();
            
            $this->addFlash('success', 'Étudiant ajouté avec succès !');
            return $this->redirectToRoute('admin_student_index');
        }
        
        return $this->render('admin/student/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_student_edit')]
    public function edit(Student $student, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(StudentType::class, $student);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            
            $this->addFlash('success', 'Étudiant modifié avec succès !');
            return $this->redirectToRoute('admin_student_index');
        }
        
        return $this->render('admin/student/edit.html.twig', [
            'form' => $form->createView(),
            'student' => $student
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_student_delete', methods: ['POST'])]
    public function delete(Student $student, EntityManagerInterface $em): Response
    {
        $em->remove($student);
        $em->flush();
        
        $this->addFlash('success', 'Étudiant supprimé avec succès !');
        return $this->redirectToRoute('admin_student_index');
    }
}
