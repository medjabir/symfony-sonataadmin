<?php

// src/Admin/BlogPostAdmin.php

namespace App\Admin;

use App\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

final class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title');
        $formMapper->add('body');
        $formMapper->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'name'
        ]);


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('authors');
        
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->add('body');
        $listMapper->add('category.name');

        $listMapper->add('author.name', 'sonata_type_model', [
            // 'associated_property' => 'name'
            'multiple' => true,
        ]);

    }
}