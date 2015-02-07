<?php

namespace SONAcl\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_roles")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\RoleRepository")
 */
class Role 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="SONAcl\Entity\Role")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true, onDelete="SET NULL") 
     */
    protected $parent;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="boolean", name="is_admin", nullable=true)
     * @var boolean
     */
    protected $isAdmin;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @var datetime
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(type="datetime", name="updated_at")
     * @var datetime
     */
    protected $updatedAt;
    
    public function __construct(array $options = array()) 
    {        
        (new Hydrator\ClassMethods())->hydrate($options, $this);        
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
    }
    
    public function getId() {
        return $this->id;
    }

    public function getParent() {
        return $this->parent;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getIsAdmin() {
        return $this->isAdmin;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    public function setCreatedAt() {
        $this->createdAt = new \DateTime('now');
        return $this;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function setUpdatedAt() {
        $this->updatedAt = new \DateTime('now');
        return $this;
    }
        
    public function toArray()
    {
        if(isset($this->parent))
            $parent = $this->parent;
        else
            $parent = false;
        
        return array(
            'id' => $this->id,
            'nome' => $this->nome,            
            'isAdmin' => $this->isAdmin,
            'parent' => $parent,
        );
    }
    
}
