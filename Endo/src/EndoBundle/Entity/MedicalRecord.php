<?php

namespace EndoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="MedicalRecords")
 * @ORM\HasLifecycleCallbacks()
 */
class MedicalRecord
{
    #########################
    ##       METADATA      ##
    #########################

    // none.


    #########################
    ##      PROPERTIES     ##
    #########################

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $medicalRecordId;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $age;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $date;

    /**
     * 0: M
     * 1: F
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $sex;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $occupation;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $emergencyName;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $emergencyPhone;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $emergencyRelation;

    /**
     * @ORM\Column(type="string", nullable=true
     */
    protected $doctorName;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $reference;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $motive;

    /**
     *  0: malo
     * 1: bueno
     * 2: regular
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $healthState;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $medicalTreatment;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $takingMedicine;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    protected $sickness;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $observations;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $otherSickness;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $anesthesiaReaction;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $medicineReaction;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $bleeding;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $fainting;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $chemotherapy;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $hospitalisation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $hospitalisationDate;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $nervous;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $smoke;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $drink;

    //WOMAN

    /**
     * Meses de gestación
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $pregnant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $periodProblems;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $hormones;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $breastfeeding;

    ///-----------///

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $pain;

    /**
     * 0:mal
     * 1:bueno
     * 2:regular
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $bucalHealth;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $appearance;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $dentalExperience;

    /**
     * 0: no
     * 1: si
     * 2: Lo desconozco
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $gumsBleed;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $gumsTreatment;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $mouthBreathing;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $ulcers;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $sensibility;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $looseTooth;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $brushingFrequency;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $auxiliaryCleaning;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $squeezesTooth;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $musclePain;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $mouthStuck;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $click;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $earPain;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $chews;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $biteNails;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    protected $trauma;


    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    // none.

    #########################
    ##     CONSTRUCTOR     ##
    #########################

    //none.


    #########################
    ##    STATIC METHODS   ##
    #########################

    //none.


    #########################
    ##   SPECIAL METHODS   ##
    #########################

    /**
     * @ORM\PrePersist
     */
    public function setTimestampValue()
    {
        $this->date = new \Datetime("now");;
    }


    #########################
    ## GETTERS AND SETTERS ##
    #########################

    /**
     * Get medicalRecordId
     *
     * @return integer
     */
    public function getMedicalRecordId()
    {
        return $this->medicalRecordId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param mixed $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @return mixed
     */
    public function getEmergencyName()
    {
        return $this->emergencyName;
    }

    /**
     * @param mixed $emergencyName
     */
    public function setEmergencyName($emergencyName)
    {
        $this->emergencyName = $emergencyName;
    }

    /**
     * @return mixed
     */
    public function getEmergencyPhone()
    {
        return $this->emergencyPhone;
    }

    /**
     * @param mixed $emergencyPhone
     */
    public function setEmergencyPhone($emergencyPhone)
    {
        $this->emergencyPhone = $emergencyPhone;
    }

    /**
     * @return mixed
     */
    public function getEmergencyRelation()
    {
        return $this->emergencyRelation;
    }

    /**
     * @param mixed $emergencyRelation
     */
    public function setEmergencyRelation($emergencyRelation)
    {
        $this->emergencyRelation = $emergencyRelation;
    }

    /**
     * @return mixed
     */
    public function getDoctorName()
    {
        return $this->doctorName;
    }

    /**
     * @param mixed $doctorName
     */
    public function setDoctorName($doctorName)
    {
        $this->doctorName = $doctorName;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getMotive()
    {
        return $this->motive;
    }

    /**
     * @param mixed $motive
     */
    public function setMotive($motive)
    {
        $this->motive = $motive;
    }

    /**
     * @return mixed
     */
    public function getHealthState()
    {
        return $this->healthState;
    }

    /**
     * @param mixed $healthState
     */
    public function setHealthState($healthState)
    {
        $this->healthState = $healthState;
    }

    /**
     * @return mixed
     */
    public function getMedicalTreatment()
    {
        return $this->medicalTreatment;
    }

    /**
     * @param mixed $medicalTreatment
     */
    public function setMedicalTreatment($medicalTreatment)
    {
        $this->medicalTreatment = $medicalTreatment;
    }

    /**
     * @return mixed
     */
    public function getTakingMedicine()
    {
        return $this->takingMedicine;
    }

    /**
     * @param mixed $takingMedicine
     */
    public function setTakingMedicine($takingMedicine)
    {
        $this->takingMedicine = $takingMedicine;
    }

    /**
     * @return mixed
     */
    public function getSickness()
    {
        return $this->sickness;
    }

    /**
     * @param mixed $sickness
     */
    public function setSickness($sickness)
    {
        $this->sickness = $sickness;
    }

    /**
     * @return mixed
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * @param mixed $observations
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;
    }

    /**
     * @return mixed
     */
    public function getOtherSickness()
    {
        return $this->otherSickness;
    }

    /**
     * @param mixed $otherSickness
     */
    public function setOtherSickness($otherSickness)
    {
        $this->otherSickness = $otherSickness;
    }

    /**
     * @return mixed
     */
    public function getAnesthesiaReaction()
    {
        return $this->anesthesiaReaction;
    }

    /**
     * @param mixed $anesthesiaReaction
     */
    public function setAnesthesiaReaction($anesthesiaReaction)
    {
        $this->anesthesiaReaction = $anesthesiaReaction;
    }

    /**
     * @return mixed
     */
    public function getMedicineReaction()
    {
        return $this->medicineReaction;
    }

    /**
     * @param mixed $medicineReaction
     */
    public function setMedicineReaction($medicineReaction)
    {
        $this->medicineReaction = $medicineReaction;
    }

    /**
     * @return mixed
     */
    public function getBleeding()
    {
        return $this->bleeding;
    }

    /**
     * @param mixed $bleeding
     */
    public function setBleeding($bleeding)
    {
        $this->bleeding = $bleeding;
    }

    /**
     * @return mixed
     */
    public function getFainting()
    {
        return $this->fainting;
    }

    /**
     * @param mixed $fainting
     */
    public function setFainting($fainting)
    {
        $this->fainting = $fainting;
    }

    /**
     * @return mixed
     */
    public function getChemotherapy()
    {
        return $this->chemotherapy;
    }

    /**
     * @param mixed $chemotherapy
     */
    public function setChemotherapy($chemotherapy)
    {
        $this->chemotherapy = $chemotherapy;
    }

    /**
     * @return mixed
     */
    public function getHospitalisation()
    {
        return $this->hospitalisation;
    }

    /**
     * @param mixed $hospitalisation
     */
    public function setHospitalisation($hospitalisation)
    {
        $this->hospitalisation = $hospitalisation;
    }

    /**
     * @return mixed
     */
    public function getHospitalisationDate()
    {
        return $this->hospitalisationDate;
    }

    /**
     * @param mixed $hospitalisationDate
     */
    public function setHospitalisationDate($hospitalisationDate)
    {
        $this->hospitalisationDate = $hospitalisationDate;
    }

    /**
     * @return mixed
     */
    public function getNervous()
    {
        return $this->nervous;
    }

    /**
     * @param mixed $nervous
     */
    public function setNervous($nervous)
    {
        $this->nervous = $nervous;
    }

    /**
     * @return mixed
     */
    public function getSmoke()
    {
        return $this->smoke;
    }

    /**
     * @param mixed $smoke
     */
    public function setSmoke($smoke)
    {
        $this->smoke = $smoke;
    }

    /**
     * @return mixed
     */
    public function getDrink()
    {
        return $this->drink;
    }

    /**
     * @param mixed $drink
     */
    public function setDrink($drink)
    {
        $this->drink = $drink;
    }

    /**
     * @return mixed
     */
    public function getPregnant()
    {
        return $this->pregnant;
    }

    /**
     * @param mixed $pregnant
     */
    public function setPregnant($pregnant)
    {
        $this->pregnant = $pregnant;
    }

    /**
     * @return mixed
     */
    public function getPeriodProblems()
    {
        return $this->periodProblems;
    }

    /**
     * @param mixed $periodProblems
     */
    public function setPeriodProblems($periodProblems)
    {
        $this->periodProblems = $periodProblems;
    }

    /**
     * @return mixed
     */
    public function getHormones()
    {
        return $this->hormones;
    }

    /**
     * @param mixed $hormones
     */
    public function setHormones($hormones)
    {
        $this->hormones = $hormones;
    }

    /**
     * @return mixed
     */
    public function getBreastfeeding()
    {
        return $this->breastfeeding;
    }

    /**
     * @param mixed $breastfeeding
     */
    public function setBreastfeeding($breastfeeding)
    {
        $this->breastfeeding = $breastfeeding;
    }

    /**
     * @return mixed
     */
    public function getPain()
    {
        return $this->pain;
    }

    /**
     * @param mixed $pain
     */
    public function setPain($pain)
    {
        $this->pain = $pain;
    }

    /**
     * @return mixed
     */
    public function getBucalHealth()
    {
        return $this->bucalHealth;
    }

    /**
     * @param mixed $bucalHealth
     */
    public function setBucalHealth($bucalHealth)
    {
        $this->bucalHealth = $bucalHealth;
    }

    /**
     * @return mixed
     */
    public function getAppearance()
    {
        return $this->appearance;
    }

    /**
     * @param mixed $appearance
     */
    public function setAppearance($appearance)
    {
        $this->appearance = $appearance;
    }

    /**
     * @return mixed
     */
    public function getDentalExperience()
    {
        return $this->dentalExperience;
    }

    /**
     * @param mixed $dentalExperience
     */
    public function setDentalExperience($dentalExperience)
    {
        $this->dentalExperience = $dentalExperience;
    }

    /**
     * @return mixed
     */
    public function getGumsBleed()
    {
        return $this->gumsBleed;
    }

    /**
     * @param mixed $gumsBleed
     */
    public function setGumsBleed($gumsBleed)
    {
        $this->gumsBleed = $gumsBleed;
    }

    /**
     * @return mixed
     */
    public function getGumsTreatment()
    {
        return $this->gumsTreatment;
    }

    /**
     * @param mixed $gumsTreatment
     */
    public function setGumsTreatment($gumsTreatment)
    {
        $this->gumsTreatment = $gumsTreatment;
    }

    /**
     * @return mixed
     */
    public function getMouthBreathing()
    {
        return $this->mouthBreathing;
    }

    /**
     * @param mixed $mouthBreathing
     */
    public function setMouthBreathing($mouthBreathing)
    {
        $this->mouthBreathing = $mouthBreathing;
    }

    /**
     * @return mixed
     */
    public function getUlcers()
    {
        return $this->ulcers;
    }

    /**
     * @param mixed $ulcers
     */
    public function setUlcers($ulcers)
    {
        $this->ulcers = $ulcers;
    }

    /**
     * @return mixed
     */
    public function getSensibility()
    {
        return $this->sensibility;
    }

    /**
     * @param mixed $sensibility
     */
    public function setSensibility($sensibility)
    {
        $this->sensibility = $sensibility;
    }

    /**
     * @return mixed
     */
    public function getLooseTooth()
    {
        return $this->looseTooth;
    }

    /**
     * @param mixed $looseTooth
     */
    public function setLooseTooth($looseTooth)
    {
        $this->looseTooth = $looseTooth;
    }

    /**
     * @return mixed
     */
    public function getBrushingFrequency()
    {
        return $this->brushingFrequency;
    }

    /**
     * @param mixed $brushingFrequency
     */
    public function setBrushingFrequency($brushingFrequency)
    {
        $this->brushingFrequency = $brushingFrequency;
    }

    /**
     * @return mixed
     */
    public function getAuxiliaryCleaning()
    {
        return $this->auxiliaryCleaning;
    }

    /**
     * @param mixed $auxiliaryCleaning
     */
    public function setAuxiliaryCleaning($auxiliaryCleaning)
    {
        $this->auxiliaryCleaning = $auxiliaryCleaning;
    }

    /**
     * @return mixed
     */
    public function getSqueezesTooth()
    {
        return $this->squeezesTooth;
    }

    /**
     * @param mixed $squeezesTooth
     */
    public function setSqueezesTooth($squeezesTooth)
    {
        $this->squeezesTooth = $squeezesTooth;
    }

    /**
     * @return mixed
     */
    public function getMusclePain()
    {
        return $this->musclePain;
    }

    /**
     * @param mixed $musclePain
     */
    public function setMusclePain($musclePain)
    {
        $this->musclePain = $musclePain;
    }

    /**
     * @return mixed
     */
    public function getMouthStuck()
    {
        return $this->mouthStuck;
    }

    /**
     * @param mixed $mouthStuck
     */
    public function setMouthStuck($mouthStuck)
    {
        $this->mouthStuck = $mouthStuck;
    }

    /**
     * @return mixed
     */
    public function getClick()
    {
        return $this->click;
    }

    /**
     * @param mixed $click
     */
    public function setClick($click)
    {
        $this->click = $click;
    }

    /**
     * @return mixed
     */
    public function getEarPain()
    {
        return $this->earPain;
    }

    /**
     * @param mixed $earPain
     */
    public function setEarPain($earPain)
    {
        $this->earPain = $earPain;
    }

    /**
     * @return mixed
     */
    public function getChews()
    {
        return $this->chews;
    }

    /**
     * @param mixed $chews
     */
    public function setChews($chews)
    {
        $this->chews = $chews;
    }

    /**
     * @return mixed
     */
    public function getBiteNails()
    {
        return $this->biteNails;
    }

    /**
     * @param mixed $biteNails
     */
    public function setBiteNails($biteNails)
    {
        $this->biteNails = $biteNails;
    }

    /**
     * @return mixed
     */
    public function getTrauma()
    {
        return $this->trauma;
    }

    /**
     * @param mixed $trauma
     */
    public function setTrauma($trauma)
    {
        $this->trauma = $trauma;
    }


    #########################
    ##  OBJECT REL: G & S  ##
    #########################

    // none.

}