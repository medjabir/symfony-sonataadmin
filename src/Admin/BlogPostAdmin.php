<?php

// src/Admin/BlogPostAdmin.php   

namespace App\Admin;

use App\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelType;

final class BlogPostAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->tab('Blog Posts')
            ->with('Content', ['class' => 'col-md-9'])
                ->add('title', TextType::class)
                ->add('body', TextareaType::class)
            ->end()
        ->end();
        // $formMapper->add('category', EntityType::class, [
        //     'class' => Category::class,
        //     'choice_label' => 'name',
        // ]);

        $formMapper
        ->tab('Category')
            ->with('Category', ['class' => 'col-md-3'])
                ->add('category', ModelType::class, [
                'property' => 'name'
                ])
            ->end()
        ->end();

    }

    protected function configureDatagridFilter(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('body')
            ->add('category', null, [
                'associated_property' => 'name'
            ]);
    }


    
}