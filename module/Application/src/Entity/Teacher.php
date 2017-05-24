<?
	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * @ORM\Entity
	 * @ORM\Table(name="teacher")
	 */
	class Teacher 
	{
		/**
		* @ORM\Id
		* @ORM\GeneratedValue
		* @ORM\Column(name="id")   
		*/
		protected $id;
		
		/** 
		* @var string
		*
		* @ORM\Column(name="name", type="string", length=255, nullable=false)  
		*/
		protected $name;
		
		/** 
		* @var string
		*
		* @ORM\Column(name="lastname", type="string", length=255, nullable=false)  
		*/
		protected $lastname;
		
		/** 
		* @var string
		*
		* @ORM\Column(name="address", type="string", length=255, nullable=true)  
		*/
		protected $address;
		
		/**
		* @var string
		*
		* @ORM\Column(name="email", type="string", length=255, nullable=true)
		*/
		private $email;    
		
		/**
		* @var integer
		*
		* @ORM\Column(name="telefono", type="integer")
		*/
		private $phone;
		
		/**
		* @var \Doctrine\Common\Collections\Collection|Subject[]
		*
		* @ORM\@ManyToMany(targetEntity="Subject")
		* @JoinTable(name="teachers_subjects",
		*      joinColumns={@JoinColumn(name="teacher_id", referencedColumnName="id")},
		*      inverseJoinColumns={@JoinColumn(name="subject_id", referencedColumnName="id", unique=true)}
		*/
		protected $subjects;    
		
		/** 
		* @var string
		*
		* @ORM\Column(name="status", type="string")  
		*/
		protected $status;
		
		/**
		* @ORM\Column(name="date_created", type="datetime")  
		*/
		protected $dateCreated;   
		
		/**
		* Get id
		*
		* @return integer 
		*/
		public function getId()
		{
			return $this->id;
		}
		
		/**
		* Set name
		*
		* @param string $name
		* @return Teacher
		*/
		public function setName($name)
		{
			$this->name = $name;
			
			return $this;
		}
		
		/**
		* Get name
		*
		* @return string 
		*/
		public function getName()
		{
			return $this->name;
		}
				
		/**
		* Set lastname
		*
		* @param string $lastname
		* @return Teacher
		*/
		public function setLastname($lastname)
		{
			$this->lastname = $lastname;
			
			return $this;
		}
		
		/**
		* Get lastname
		*
		* @return string 
		*/
		public function getLastname()
		{
			return $this->lastname;
		}
				
		/**
		* Set address
		*
		* @param string $address
		* @return Teacher
		*/
		public function setAddress($address)
		{
			$this->address = $address;
			
			return $this;
		}
		
		/**
		* Get address
		*
		* @return string 
		*/
		public function getAddress()
		{
			return $this->address;
		}
				
		/**
		* Set email
		*
		* @param string $email
		* @return Teacher
		*/
		public function setEmail($email)
		{
			$this->email = $email;
			
			return $this;
		}
		
		/**
		* Get email
		*
		* @return string 
		*/
		public function getEmail()
		{
			return $this->email;
		}

		/**
		* Set phone
		*
		* @param int $phone
		* @return Teacher
		*/
		public function setPhone($phone)
		{
			$this->phone = $phone;
			
			return $this;
		}
		
		/**
		* Get phone
		*
		* @return string 
		*/
		public function getPhone()
		{
			return $this->phone;
		}
		
		/**
		* Get address
		*
		* @return Collection
		*/
		public function getSubjects()
		{
			return $this->subjects;
		}

		/**
		 * @param Subject $subject
		 */
		public function addSubject(Subject $subject)
		{
			if ($this->subjects->contains($subject)) {
				return;
			}
			$this->subjects->add($subject);
			$subject->addTeacher($this);
		}
		
		/**
		 * @param Subject $subject
		 */
		public function removeSubject(Subject $subject)
		{
			if (!$this->subjects->contains($subject)) {
				return;
			}
			$this->subjects->removeElement($subject);
			$subject->removeTeacher($this);
		}

		/**
		* Set status
		*
		* @param string $status
		* @return Teacher
		*/
		public function setStatus($status)
		{
			$this->status = $status;
			
			return $this;
		}
		
		/**
		* Get status
		*
		* @return string 
		*/
		public function getStatus()
		{
			return $this->status;
		}
	}

?>