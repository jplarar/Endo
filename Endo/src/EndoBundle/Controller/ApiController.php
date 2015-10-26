<?php

namespace EndoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use EndoBundle\Entity\MedicalRecord;
use EndoBundle\Utility\ApiUtility;
class ApiController extends Controller
{

    /**
     * store new form
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        ## 1. Validate request
        $api = new ApiUtility($request);

        // Obligatory parameters needed for this operation to succeed.
        $requestParameters = array(
            'name', 'age', 'date', 'sex', 'address', 'phone', 'email', 'occupation', 'emergencyName',
            'emergencyPhone', 'emergencyRelation', 'doctorName', 'reference', 'motive', 'healthState',
            'medicalTreatment', 'sickness', 'otherSickness', 'anesthesiaReaction',
            'bleeding', 'fainting', 'hospitalisation',
            'nervous', 'bucalHealth', 'appearance', 'dentalExperience', 'gumsBleed',
            'gumsTreatment', 'mouthBreathing', 'ulcers', 'looseTooth', 'brushingFrequency', 'auxiliaryCleaning',
            'squeezesTooth', 'musclePain', 'mouthStuck', 'click', 'earPain', 'chews', 'biteNails', 'trauma'
        );

        $error = $api->validateRequest();

        // Return response
        if($error)
        {
            $response = $api->generateErrorResponse($error);
            return $response;
        }

        ## 2. Prepare information
        $medicalRecord = new MedicalRecord();

        $updateParameters = array(
            'name', 'age', 'date', 'sex', 'address', 'phone', 'email', 'occupation', 'emergencyName',
            'emergencyPhone', 'emergencyRelation', 'doctorName', 'reference', 'motive', 'healthState',
            'medicalTreatment', 'takingMedicine', 'sickness', 'observations', 'otherSickness', 'anesthesiaReaction',
            'medicineReaction', 'bleeding', 'fainting', 'hospitalisation',
            'nervous', 'smoke', 'drink', 'pain', 'bucalHealth', 'appearance', 'dentalExperience', 'gumsBleed',
            'gumsTreatment', 'mouthBreathing', 'ulcers', 'sensibility', 'looseTooth', 'brushingFrequency', 'auxiliaryCleaning',
            'squeezesTooth', 'musclePain', 'mouthStuck', 'click', 'earPain', 'chews', 'biteNails', 'trauma',
            'pregnant', 'periodProblems', 'hormones', 'breastfeeding'
        );

        foreach ($updateParameters as $p)
        {
            if($api->hasParameter($p)) {
                $func = 'set' . ucfirst($p);
                $medicalRecord->$func($api->getParameter($p));
            }
        }

        // PARSE DATE
        $medicalRecord->setChemotherapy(new \DateTime($api->getParameter('chemotherapy')));
        $medicalRecord->setHospitalisationDate(new \DateTime($api->getParameter('hospitalisationDate')));

        /* @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->persist($medicalRecord);
        $em->flush();

        ## 4. Return payload
        $response = $api->generateResponse();
        return $response;
    }
}
