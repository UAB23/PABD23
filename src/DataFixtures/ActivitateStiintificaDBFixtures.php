<?php

namespace App\DataFixtures;

use App\Entity\ActivitateStiintificaDB;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivitateStiintificaDBFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $actS1 = new ActivitateStiintificaDB();
        $actS1->setTip(1); //teza dr
        $actS1->setDescriere("Contribuții privind dezvoltarea sistemelor independente CAD pentru procesarea complexă a imaginilor 2D/3D, susținută la Universitatea “Dunărea de Jos” din Galaţi în 2013. "); //carte
        $manager->persist($actS1);

        $actS2 = new ActivitateStiintificaDB();
        $actS2->setTip(2); //carte
        $actS2->setDescriere("L. Moraru, S. Moldovanu, D. Bibicu, Metode avansate de procesare și analiză a imaginilor complexe, Galati University Press, 2013, ISBN 978-606-8348-67-4, pp.1-196. "); //carte
        $manager->persist($actS2);

        $actS3 = new ActivitateStiintificaDB();
        $actS3->setTip(3); //isi
        $actS3->setDescriere("D. Bibicu, S. Moldovanu, L. Moraru, De-noising of Ultrasound Images from Cardiac Cycle using Complex Wavelet Transform with Dual Tree, Journal of Engineering Studies and Research, vol. 18, no. 1, 2012, pp. 24-30. "); //carte
        $manager->persist($actS3);
        
        $actS4 = new ActivitateStiintificaDB();
        $actS4->setTip(3); //isi
        $actS4->setDescriere("Dorin Bibicu, Luminita Moraru, Anjan Biswas, Thyroid Nodule Recognition Based on Feature Selection and Pixel Classification Methods, Journal of Digital Imaging, ISSN 0897-1889, Volume 26, Number 1, pp. 119-128, 2013, Factor Impact=1.255."); //carte
        $manager->persist($actS4);

        $actS5 = new ActivitateStiintificaDB();
        $actS5->setTip(3); //isi
        $actS5->setDescriere("D. Bibicu, L. Moraru, Cardiac Cycle Phase Estimation in 2-D Echocardiographic Images using an Artificial Neural Network, IEEE Transactions on Biomedical Engineering, 60 (5), pp. 1273-1279, 2013, Print ISSN: 0018-9294, Factor Impact 2.278"); //carte
        $manager->persist($actS5);

        $actS6= new ActivitateStiintificaDB();
        $actS6->setTip(3); //isi
        $actS6->setDescriere("L. Moraru, D. Bibicu, A. Biswas, Standalone functional CAD system for multi-object case analysis in hepatic disorders, Computers in Biology and Medicine, 2013, ISSN 0010-4825, Factor Impact=1.089."); //carte
        $manager->persist($actS6);

        $actS7= new ActivitateStiintificaDB();
        $actS7->setTip(3); //isi
        $actS7->setDescriere("Dorin Bibicu, Luminita Moraru and Anjan Biswas, Efficient Segmentation Using Active Contours Embedded in an Image Feature, Journal of Medical Imaging and Health Informatics Vol. 5, 241–247, 2015, ISSN 2156-7018, FI 0.621."); //carte
        $manager->persist($actS7);

        $actS8= new ActivitateStiintificaDB();
        $actS8->setTip(3); //isi
        $actS8->setDescriere("Moraru L , Moldovanu S , Culea-Florescu AL , Bibicu D, Ashour AS , Dey N, Texture analysis of parasitological liver fibrosis images, Microsc. Res. Tech. 2017 Aug;80(8):862-869, ISSN 1059-910X, FI 1.147."); //carte
        $manager->persist($actS8);

        $actS9= new ActivitateStiintificaDB();
        $actS9->setTip(3); //isi
        $actS9->setDescriere("Moraru, L., Moldovanu, S., Culea-Florescu, A.-L., Bibicu, D., Dey, N., Ashour, A. S. and Sherratt, S, Texture spectrum coupled with entropy and homogeneity image features for myocardium muscle characterization, Current Bioinformatics. Print ISSN: 1574-8936, FI 0.6, january 2018."); //carte
        $manager->persist($actS9);

        $actS10= new ActivitateStiintificaDB();
        $actS10->setTip(4); //bdi
        $actS10->setDescriere("S. Moldovanu, D. Bibicu, L. Moraru, Comparative study of density distribution of microbubbles between frames end-systole and end-diastole inside cavity left ventricle, Journal of Engineering Studies and Research, vol. 18, no. 3, 2012, pp. 87-91."); //carte
        $manager->persist($actS10);

        $actS11= new ActivitateStiintificaDB();
        $actS11->setTip(4); //bdi
        $actS11->setDescriere("D. Bibicu, L. Moraru, Run-Length Textural Descriptors and Artificial Neural Networks for Steatosis Liver Disease Detection, Advanced Science, Engineering and Medicine, 5(11), November 2013 , pp. 1137-1143."); //carte
        $manager->persist($actS11);

        $actS12= new ActivitateStiintificaDB();
        $actS12->setTip(4); //bdi
        $actS12->setDescriere("D. Bibicu, L. Moraru, Echocardiographic evaluation of myocardium wall via CAD application and Artificial Neural Network, Scientific Annals of the University Dunarea de Jos of Galati: Fascicle II, Mathematics, Physics, Theoretical Mechanics . 2013, Vol. 36, Issue 1, p5-11."); //carte
        $manager->persist($actS12);

        $actS13= new ActivitateStiintificaDB();
        $actS13->setTip(4); //bdi
        $actS13->setDescriere("D. Bibicu, L. Moraru, Hybrid CADiSolution for Foreign Bodies Detection in Abdominal Echographic Images, Annals of “Dunarea de Jos” University of Galati Mathematics, Physics, Theoretical Mechanics Fascicle II, year VI (XXXVII) 2014, No. 1, Proceedings of the Scientific Conference of Doctoral Schools from “Dunărea de Jos” University of Galati (CCSD-UDJG 2014), Galati, May 15-16, 2014 Section 4 - applied sciences and environment, pp 17-24."); //carte
        $manager->persist($actS13);

        $actS14= new ActivitateStiintificaDB();
        $actS14->setTip(4); //bdi
        $actS14->setDescriere("Dorin Bibicu, Luminita Moraru,Simona Moldovanu, Thyroid Nodules Investigation based on an Artificial Neural Network, Annals of the University Dunarea de Jos of Galati: Fascicle II, Mathematics, Physics, Theoretical Mechanics . 2017, Vol. 40 Issue 1, p43-54."); //carte
        $manager->persist($actS14);

        $actS15= new ActivitateStiintificaDB();
        $actS15->setTip(4); //bdi
        $actS15->setDescriere("Simona Moldovanu, Luminita Moraru, Diana Stefanescu, Dorin Bibicu, Edge-Preserving Filters in a Boundary Options Context, Annals of the University Dunarea de Jos of Galati: Fascicle II, Mathematics, Physics, Theoretical Mechanics . 2017, Vol. 40 Issue 1, p5-11."); //carte
        $manager->persist($actS15);

        $actS16= new ActivitateStiintificaDB();
        $actS16->setTip(4); //bdi
        $actS16->setDescriere("Dorin Bibicu, Luminita MORARU, Simona MOLDOVANU,  Local or External Databases in Android Programming. A Practical Comparative Study, Annals of “Dunarea de Jos” University of Galati Fascicle I. Economics and Applied Informatics Years XXIV – no1/201."); //carte
        $manager->persist($actS16);

        $actS17= new ActivitateStiintificaDB();
        $actS17->setTip(4); //bdi
        $actS17->setDescriere("Maria (Stan) Necula, Dorin Bibicu, Simona Moldovanu, Luminita Moraru, Performance Analysis of an Array of Sensors Based on the Direction of Arrival algorithm, Conference of Doctoral Schools from Dunarea de Jos University Galati, Romania, 7-8 June 2018, prezentare poster, Annals of “Dunarea de Jos” University of Galati, Mathematics, Physics, theoretical mechanics, Fascicle II, year X (XLI) 2018, No. 1, pp. 70-75."); //carte
        $manager->persist($actS17);

        $actS18= new ActivitateStiintificaDB();
        $actS18->setTip(4); //bdi
        $actS18->setDescriere("Simona Moldovanu, Luminița Moraru, Dorin Bibicu, Face detection with Euler number algorithm based on morphological operators, Conference of Doctoral Schools from Dunarea de Jos University Galati, Romania, 7-8 June 2018, prezentare poster, Annals of “Dunarea de Jos” University of Galati, Mathematics, Physics, theoretical mechanics, Fascicle II, year X (XLI) 2018, No. 1, pp. 65-69."); //carte
        $manager->persist($actS18);

        $actS19= new ActivitateStiintificaDB();
        $actS19->setTip(4); //bdi
        $actS19->setDescriere("Necula (Stan), M., Bibicu, D. and Moraru, L. (2019) “Vibration of rectangular plates: fundamental mode and integer multiple of the fundamental period of vibration”, Analele Universității ”Dunărea de Jos” din Galați. Fascicula II, Matematică, fizică, mecanică teoretică / Annals of the ”Dunarea de Jos” University of Galati. Fascicle II, Mathematics, Physics, Theoretical Mechanics, 42(1), pp 43-48. Chemometric application operating a portable laser infrared sensor detecting illicit phenethylamines."); //carte
        $manager->persist($actS19);

        $actS20= new ActivitateStiintificaDB();
        $actS20->setTip(4); //bdi
        $actS20->setDescriere("Bibicu Dorin, An Original Algorithm for Password Encryption, Annals of “Dunarea de Jos” University of Galati Fascicle I. Economics and Applied Informatics Years XXVII – no2/2021, pp. 133-136."); //carte
        $manager->persist($actS20);

        $actS21= new ActivitateStiintificaDB();
        $actS21->setTip(5); //neindexate
        $actS21->setDescriere("Luminiţa Moraru, Dorin Bibicu, Segmentarea Imaginilor Digitale, Revista de Fizică Medicală, Vol 2, nr 1, Aprilie 2014, ISSN 2344-3944."); //carte
        $manager->persist($actS21);

        $actS22= new ActivitateStiintificaDB();
        $actS22->setTip(5); //neindexate
        $actS22->setDescriere("Bibicu Dorin, Negru Ionut, Iancu Tiberiu, Virtual catalog, SmartStudent, ISSN 2559-2513, 2016, pp 69-73."); //carte
        $manager->persist($actS22);

        $actS23= new ActivitateStiintificaDB();
        $actS23->setTip(5); //neindexate
        $actS23->setDescriere("Bibicu Dorin, Ignat Cristian, Negru Ionuţ, Credit E-Learning, SmartStudent, ISSN 2559-2513, 2016, 74-80."); //carte
        $manager->persist($actS23);

        $actS24= new ActivitateStiintificaDB();
        $actS24->setTip(5); //neindexate
        $actS24->setDescriere("Dumitrov Cristian-Andrei, Fotache Ionela, Bibicu Dorin, StockUI, SmartStudent, ISSN 2559-2513, 2016 pp.131-136."); //carte
        $manager->persist($actS24);

        $actS25= new ActivitateStiintificaDB();
        $actS25->setTip(5); //neindexate
        $actS25->setDescriere("Bibicu Dorin, C# de la A la Z – articole publicate în revista de informatică IMPULS++, nr-le. 2-12, Galaţi, ISSN 2067-9815."); //carte
        $manager->persist($actS25);

        $actS26= new ActivitateStiintificaDB();
        $actS26->setTip(5); //neindexate
        $actS26->setDescriere("Gheorghiță Dana, Bibicu Dorin, O nouă abordare privind dezvoltarea aplicației ImageSlideShow în Android Studio, SmartStudent, FEAA Galati, ISSN 2559-2513, 2019."); //carte
        $manager->persist($actS26);

        $actS27= new ActivitateStiintificaDB();
        $actS27->setTip(6); //stagii
        $actS27->setDescriere("Stagiu de cercetare la Universitatea Le Havre, Franța, cu tema “La diffusion résonnante par trois et quatre tube élastique”."); //carte
        $manager->persist($actS27);

        $actS28= new ActivitateStiintificaDB();
        $actS28->setTip(6); //stagii
        $actS28->setDescriere("Stagiu de cercetare la Laboratorul de Dinamică și Imagistică Cardiovasculară din Leuven, Belgia, cu tema -Segmentarea imaginilor ecocardiografice 3D prin metoda BEAS și contribuții la dezvoltarea platformei software de diagnosticare medicală denumită Speqle3D-."); //carte
        $manager->persist($actS28);

        $actS29= new ActivitateStiintificaDB();
        $actS29->setTip(6); //stagii
        $actS29->setDescriere("Membru cercetător în proiectul MESMERISE 700399/2016 Title: Multi-Energy High Resolution Modular Scan System for Internal and External Concealed Commodities, Horizon 2020."); //carte
        $manager->persist($actS29);

        $actS30= new ActivitateStiintificaDB();
        $actS30->setTip(7); //ultima actualizare
        $actS30->setDescriere("Ultima actualizare 26.03.2023"); //carte
        $manager->persist($actS30);

        $manager->flush();
    }
}
