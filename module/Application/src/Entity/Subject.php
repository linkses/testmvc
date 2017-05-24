<?
	namespace Application\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * @ORM\Entity
	 * @ORM\Table(name="subject")
	 */
	class Subject 
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
		* @ORM\Column(name="title", type="string")  
		*/
		protected $title;
		
		/** 
		* @var string
		*
		* @ORM\Column(name="course", type="integer", options={"comment":"This field should be a foreign key (ManyToOne) to a Course entity"}) 
		*/
		protected $course;
		
		/**
		* @var \Doctrine\Common\Collections\Collection|Teacher[]
		*
		* @ORM\@ManyToMany(targetEntity="Teacher")
		* @JoinTable(name="teachers_subjects",
		*      joinColumns={@JoinColumn(name="subject_id", referencedColumnName="id")},
		*      inverseJoinColumns={@JoinColumn(name="teacher_id", referencedColumnName="id", unique=true)}
		*/
		protected $teachers;    
		
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
		* Set title
		*
		* @param string $title
		* @return Subject
		*/
		public function setTitle($title)
		{
			$this->title = $title;
			
			return $this;
		}
		
		/**
		* Get title
		*
		* @return string 
		*/
		public function getTitle()
		{
			return $this->title;
		}
				
		/**
		* Get title
		*
		* @return Collection
		*/
		public function getTeachers()
		{
			return $this->teachers;
		}

		/**
		 * @param Teacher $teacher
		 */
		public function addTeacher(Teacher $teacher)
		{
			if ($this->teachers->contains($teacher)) {
				return;
			}
			$this->teachers->add($teacher);
			$teacher->addSubject($this);
		}
		
		/**
		 * @param Teacher $teacher
		 */
		public function removeSubject(Teacher $teacher)
		{
			if (!$this->teachers->contains($teacher)) {
				return;
			}
			$this->teachers->removeElement($teacher);
			$teacher->removeTeacher($this);
		}

		/**
		* Set status
		*
		* @param string $status
		* @return Subject
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