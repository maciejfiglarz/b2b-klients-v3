<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @ORM\Entity())
 */
class SyliusShopUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $usernameCanonical;

    /**
     * @ORM\Column(name="enabled", type="boolean",nullable=true)
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $salt;

       /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $lastLogin;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $passwordResetToken;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $passwordRequestedAt;
    

     /**
     * @ORM\Column(type="string", length=120,nullable=true)
     */
    private $emailVerificationToken;

     /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $verifiedAt;

    /**
     * @ORM\Column(name="locked", type="boolean",nullable=true)
     */
    private $locked;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $expiresAt;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $credentialsExpireAt;
    
     /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $roles;

     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $email;

     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $emailCanonical;

     /**
     * @ORM\Column(type="datetime",nullable=true)
     */

    private $createdAt;

     /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $encoderName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Customer", cascade={"persist", "remove"})
     */
    private $customer;



 

    public function __construct()
    {
        $this->isActive = true;
 
        
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsernameCanonical(): ?string
    {
        return $this->usernameCanonical;
    }

    public function setUsernameCanonical(string $usernameCanonical): self
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getPasswordResetToken(): ?string
    {
        return $this->passwordResetToken;
    }

    public function setPasswordResetToken(string $passwordResetToken): self
    {
        $this->passwordResetToken = $passwordResetToken;

        return $this;
    }



    public function getEmailVerificationToken(): ?string
    {
        return $this->emailVerificationToken;
    }

    public function setEmailVerificationToken(string $emailVerificationToken): self
    {
        $this->emailVerificationToken = $emailVerificationToken;

        return $this;
    }

    public function getVerifiedAt(): ?\DateTimeInterface
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(\DateTimeInterface $verifiedAt): self
    {
        $this->verifiedAt = $verifiedAt;

        return $this;
    }

    public function getLocked(): ?bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeInterface
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getCredentialsExpireAt(): ?\DateTimeInterface
    {
        return $this->credentialsExpireAt;
    }

    public function setCredentialsExpireAt(\DateTimeInterface $credentialsExpireAt): self
    {
        $this->credentialsExpireAt = $credentialsExpireAt;

        return $this;
    }

   

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmailCanonical(): ?string
    {
        return $this->emailCanonical;
    }

    public function setEmailCanonical(string $emailCanonical): self
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getEncoderName(): ?string
    {
        return $this->encoderName;
    }

    public function setEncoderName(string $encoderName): self
    {
        $this->encoderName = $encoderName;

        return $this;
    }

    public function getPasswordRequestedAt(): ?\DateTimeInterface
    {
        return $this->passwordRequestedAt;
    }

    public function setPasswordRequestedAt(?\DateTimeInterface $passwordRequestedAt): self
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }


   
}
