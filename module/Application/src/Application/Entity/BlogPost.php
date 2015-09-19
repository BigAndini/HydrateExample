<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class BlogPost
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Application\Entity\Tag", mappedBy="blogPost", cascade={"persist"})
     */
    protected $tags;


    /**
     * Never forget to initialize all your collections !
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Collection $tags
     */
    public function addTags(Collection $tags)
    {
        foreach ($tags as $tag) {
            $tag->setBlogPost($this);
            $this->tags->add($tag);
        }
    }

    /**
     * @param Collection $tags
     */
    public function removeTags(Collection $tags)
    {
        foreach ($tags as $tag) {
            $tag->setBlogPost(null);
            $this->tags->removeElement($tag);
        }
    }

    /**
     * @return Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}