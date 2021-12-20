-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 20 2021 г., 17:40
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jobmatch`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anunturi_companie`
--

CREATE TABLE `anunturi_companie` (
  `id_anunt` int(11) NOT NULL,
  `id_companie` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `titlu` varchar(30) NOT NULL,
  `poza_anunt` varchar(120) NOT NULL,
  `salariu` int(11) NOT NULL,
  `id_valuta` int(11) NOT NULL,
  `descriere` varchar(1000) NOT NULL,
  `id_categ_job` int(11) NOT NULL,
  `id_locatie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `anunturi_companie`
--

INSERT INTO `anunturi_companie` (`id_anunt`, `id_companie`, `id_job`, `titlu`, `poza_anunt`, `salariu`, `id_valuta`, `descriere`, `id_categ_job`, `id_locatie`) VALUES
(19, 17, 13, 'Lucrator linia de distributie ', 'franzeluta.jpg', 6000, 1, 'Se cauta lucrator pe linia de distributie. \r\nCerinte la locul de munca:\r\n-ambalare produse\r\n-monitorizare linia de distributie\r\n-responsabilitate\r\n-at', 11, 1),
(20, 16, 1, 'REACT.js Developer', '', 1000, 2, 'Cunostinte:\r\n-Javascript\r\n-React.js\r\n-State Management\r\n-CSS si HTML', 1, 1),
(21, 18, 15, 'Vinzator', '', 8500, 1, 'Se cauta un vanzator in centrul comercial Zorile.\r\nCerintele fata de candidat includ experienta de minim 2 ani in vanzare, responsabilitate, atentia fata de cumparator, cunoasterea aparatului de casa si gestiunea eficient a banilor.', 5, 1),
(22, 19, 17, 'Operator-casier bancar', '', 10000, 1, 'Cautam o persoana:\r\nResponsabila cu maxima atentie la detalii\r\nExperienta in pozitie similara - avantaj\r\nVorbește limba romana și rusa\r\nAre studii medii, superioare\r\nVei beneficia de:\r\n\r\nAngajare oficiala și pachet social\r\nSalariu motivant cu posibilitate de creștere\r\nInstruiri de initiere pentru persoanele fara experienta\r\nProgram de munca, luni-vineri\r\nResponsabiliatate de baza:\r\n\r\nAsigura receptionarea, sortarea si recalcularea numerarului\r\nAsigura alimentarea cu numerar a unitatilor Bancii\r\nReflectarea operatiunilor in contabilitatea Bancii', 16, 1),
(23, 20, 2, 'Developer', '', 5000, 2, 'Vrei să participi la schimbarea celei mai mari industrii din lume?\r\nSuntem una dintre cele mai populare companii de divertisment de jocuri online din lume.\r\nProiectați și implementați servicii și aplicații web atât pe partea de server, cât și pe partea clientului.\r\nMențineți și extindeți aplicațiile existente în funcție de cerințele afacerii.\r\nImplementați și mențineți calitatea codului, unitățile de testare și cele mai bune practici de cod curat.\r\nMenține și extinde baza de documentație tehnică a echipei.', 1, 1),
(24, 20, 1, 'JavaScript Developer', '', 10000, 1, 'Responsabilitati\r\nAsigurați-vă cea mai bună calitate, securitate, performanță și capacitate de răspuns a aplicațiilor la care veți lucra\r\nCreați și îmbunătățiți bogăția și capabilitățile arhitecturilor UI și oferiți o experiență de utilizator încântătoare\r\nParticipați activ la revizuirea codului și la dezvoltarea peer-to-peer\r\nComunicați idei și propuneri cu liderii de echipă, managerii de proiecte și clienții', 1, 1),
(25, 21, 17, 'Specialist Call Centru', '', 5000, 1, 'Căutăm Operator de call centru – un coleg/ă cu bune abilități de comunicare care să fie responsabil/ă de preluarea sunetelor clienților și ajutor în obținerea informației solicitate.\r\nResponsabilități:\r\nPreluarea apelurilor telefonice (uneori telefonarea clienților);\r\nRăspunderea la întrebările clienților în timp util, prin telefon, e-mail sau messengerii;\r\nPreluarea și înregistrarea comenzilor;\r\nConsultarea clienților și oferirea informației solicitate;\r\nNu presupune vânzare sau atragerea de noi clienți;\r\nAjutor la planificarea și organizarea evenimentelor companiei și a partenerilor.', 5, 13),
(26, 21, 15, 'Manager Depozit', '', 13000, 1, 'Datorită extinderii echipei, căutăm un ”Manager de evidență și livrări de marfă” în municipiul Chișinău.\r\n\r\nAtribuții:\r\nRecepționarea mărfii de import;\r\nOrganizarea operațiunilor de depozitare;\r\nControlul zilnic al stocului de produse;\r\nEfectuarea inventarierilor de produse;\r\nEvidență și operare în programul 1C;\r\nInteracțiune cu clienții și cu oficiile de vânzări (asistență informațională, răspunsuri la solicitări);\r\nPregătirea documentelor și a scrisorilor;\r\nCoordonarea activității cu serviciul de curierat și livrări;\r\nSuport administratorului Oficiuluii conform atribuțiilor postului de muncă.', 5, 6),
(27, 22, 5, 'Digital Marketing Director ', '', 9000, 1, 'Competențe necesare:\r\n- Experiență în marketing de la 2+ ani\r\n- Înțelegerea principiilor UX/UI, capacitatea de a stabili sarcini și de a evalua calitatea implementării acestora\r\n- Cunoașterea instrumentelor, capacităților tehnice și a principiilor de funcționare a tuturor tipurilor de - Publicitate și promovare online: PPC, SEO, SMM, Affiliate etc.\r\n- Nivel ridicat de competență în instrumentele de analiză web: GA, GTM\r\n- Mentate analitică, atenție la detalii, capacitatea de a lucra pentru rezultat\r\n- Creativitate, inițiativă, abilități de comunicare și o abordare creativă a sarcinilor\r\n- Independență, responsabilitate', 6, 1),
(28, 23, 9, 'Cosmetolog', '', 13500, 1, 'Candidatul ideal:\r\n- studii medicale de profil finalizate sau în curs;\r\n- disponibilitate 5 zile pe săptămână;\r\n- aspect exterior îngrijit;\r\n- punctual, responsabil și flexibil;\r\n- abilități excelente de relaționare și comunicare cu clienții;\r\n- atitudine proactivă, implicare, spirit de inițiativă;\r\n- cunoașterea avansată a limbilor română și rusă;\r\n- dorința de a învăța lucruri noi;\r\n- experiență în domeniu.', 7, 1),
(29, 26, 14, 'Graphic Designer', '', 30000, 1, 'Ești creativ, ai simț estetic bine dezvoltat, dar și cunoștințe în graphic design?!\r\nDacă îți plac provocările, îți dorești să activezi într-o companie cu renume și o carieră de succes, atunci te invităm să ne cunoaștem mai bine.\r\nAi experiență de muncă într-un post similar;\r\nȘtii să gândești conceptual;\r\nCunoști programele Adobe Illustrator și Adobe After Effects;\r\nNe prezinți portofoliul cu lucrările efectuate;\r\nFii original(ă) cu simț artistic bine dezvoltat;\r\nAi capacitatea de a respecta termene limită și de a livra la timp proiectele;', 8, 16),
(30, 26, 5, 'Social Media Manager', '', 900, 2, 'Deci, te așteptăm cu următoarele talente:\r\n- gândire analitică și spirit organizatoric; \r\n- abilități de copywriting;\r\n- cunoștințe în facebook ads din business manager;\r\n- și taaare ne dorim să ai gust estetic - urmează să lucrezi cu un graphic designer.', 12, 3),
(31, 26, 15, 'Agent vânzări', '', 5000, 1, 'Dacă ai abilități în: \r\n⦁ Acordarea informațiilor referitor la sortimentul, calitatea și prețurile produselor; \r\n⦁ Crearea cele mai bune oferte pentru clienți; \r\n⦁ Supravegherea procesului de facturare, încasare a banilor și de livrare a produselor; \r\n⦁ Respectarea obiectivului pe vînzări, și a planului strategic al companiei; ', 5, 2),
(32, 27, 4, 'Specialist în domeniul calităț', '', 1300, 3, 'Responsabilitati:\r\n- Monitorizarea și analiza sunetelor de intrare și ieșire;.\r\n- Rezistență la stres;\r\n- Îmbunătățirea permanentă a indicilor de analiză a vînzărilor;\r\n- Asimilarea cu ușurință a informațiilor noi și aplicarea lor în practică.\r\n\r\nCalitati personale:\r\n- Spirit de initiativa;\r\n- Responsabilitate;\r\n- Atentie;\r\n- Tendinta spre dezvoltare;', 4, 7),
(33, 28, 4, 'Agent vânzări în limba Engleză', '', 2000, 3, 'În calitate de Agent Turism, tu vei:\r\nPrimi stimulent de înregistrare de $1000 și comision din vânzări.\r\nRecepționa și procesa cererile clienților deja interesați în achiziția de biletele de avion și pachete turistice.\r\nAjuta clienții în alegerea celei mai bune opțiuni pentru ei.\r\nOpera cu una dintre cele mai avansate platforme de rezervare bilete de avion și pachete turistice.\r\nDezvolta relații de încredere și cooperare pe termen lung cu clienții.\r\nAvea grijă clienții să rămână mulțumiți și fericiți pe parcursul întregului proces de deservire.\r\nParticipa la cursuri de instruire și dezvoltare continuă.\r\nTrece 2 săptămâni de training, gratuit.\r\nPrimi suport 24/7 din partea unor traineri și consilieri de clasă mondială;', 4, 38),
(34, 29, 13, 'Femeie de serviciu / Ingrijito', '', 5500, 1, 'Suntem în căutare unei femei de serviciu pentru îngrijirea încăperilor din cadrul companiei.\r\nCerințe:\r\n\r\nPersoană responsabilă și cu dorință de a munci\r\nPersoană energică, harnică, atentă\r\nResponsabilă, onestă, punctuală.', 13, 29),
(35, 30, 6, 'Bucătar superior', '', 15000, 1, 'Echipa \"LInella\" este foarte prietenoasa si fiecare se ajuta unul pe altul.\r\nBucatar superior: \r\nExperienta in acest domeniu este obligatoriu:\r\nPlacerea de a lucra in echipa;\r\nPasiunea fata de bucatorie si pregatirea pentru a incerca in continuare ceva nou. \r\n', 9, 31),
(36, 31, 6, 'Bucătar', '', 7000, 1, 'Cautam persoane care au atitudine pozitiva si care doresc sa lucreze in echipa, intr-un mediu de lucru placut.\r\n\r\nRESPONSABILITATI / BENEFICII: \r\n\r\nNu este necesara experienta anterioara. Oferim un pachet salarial complex, tichete de masa, posibilitatea unui program de lucru flexibil la 8 ore, 6 ore, 4 ore sau in week-end, training specializat si sansa de a dezvolta o cariera in cadrul restaurantelor  noastre.', 9, 40),
(37, 32, 15, 'Manager Achiziții / Vânzări pe', '', 1600, 3, 'Completăm echipa noastră cu noi colegi care vorbesc maghiara, slovaca, ceha, daneza sau suedeza pentru a lucra pe piața UE.— oficiu în centrul Chișinăului;\r\n— contract de muncă oficial;\r\n— program de lucru - 8 ore (9.00-18.00) de luni până vineri;;\r\n— prânzuri din contul companiei.', 2, 5),
(38, 33, 18, 'Economist colectare', '', 9900, 1, 'Misiune post: Coordonează activitățile de recuperare creanțe și debite aferente creditelor neperformante.\r\n \r\nResponsabilități\r\n\r\nEfectuează analiza economico-financiara a clientului și stabilește strategia fată de debitor din portofoliul workout;\r\nÎntocmirea și prezentarea rapoartelor aferente expunerilor (bilanțiere și extrabilanțiere) clienților aflați în gestiune workout;\r\nÎntocmirea calculelor (inclusiv detaliate) a datoriilor aferente expunerilor (bilanțiere și extrabilanțiere) clienților aflați în gestiune workout;\r\nNegociază planuri de restructurare/rambursare încheie înțelegeri în acest sens cu clienții din portofoliul workout;\r\nElaborează  și actualizează reglementările interne aferente activitatii  workout;\r\nReprezintă interesele băncii în relația cu orice instituție sau entitate externa, care implică acțiuni în legătură cu clienții debitori din portofoliul workout;', 3, 39),
(39, 34, 8, 'Psiholog în cadrul Centrului C', '', 11000, 1, 'Responsabilități:\r\n- Efectuarea evaluării psihologice a beneficiarilor pe baza instrumentelor specifice;\r\n- Desfășurarea activităţilor de consiliere psihologică și terapie individuală;\r\n- Optimizarea și armonizarea relațiilor dintre beneficiar și familia acestuia și a relațiilor cu comunitatea;', 10, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `categ_joburi`
--

CREATE TABLE `categ_joburi` (
  `id_categ_job` int(11) NOT NULL,
  `categ_job` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categ_joburi`
--

INSERT INTO `categ_joburi` (`id_categ_job`, `categ_job`) VALUES
(1, 'IT,Programare'),
(2, 'Achiziții'),
(3, 'Asigurări'),
(4, 'Limbi străine'),
(5, 'Vânzări'),
(6, 'Marketing'),
(7, 'Frumusețe,Fitness'),
(8, 'Design'),
(9, 'Restaurante,Alimentație publică'),
(10, 'Psihologie'),
(11, 'Productie'),
(12, 'Resurse Umane,HR,Recrutare'),
(13, 'Personal casnic'),
(16, 'Banci, creditare');

-- --------------------------------------------------------

--
-- Структура таблицы `categ_skills`
--

CREATE TABLE `categ_skills` (
  `id_categ_skill` int(11) NOT NULL,
  `categ_skill` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categ_skills`
--

INSERT INTO `categ_skills` (`id_categ_skill`, `categ_skill`) VALUES
(1, 'Programare\r\n'),
(3, 'Construcții'),
(4, 'Comerț'),
(5, 'Web development'),
(6, 'Imobile'),
(7, 'Educație'),
(8, 'Medicină'),
(9, 'Comunicare'),
(10, 'Marketing');

-- --------------------------------------------------------

--
-- Структура таблицы `companii`
--

CREATE TABLE `companii` (
  `id_companie` int(11) NOT NULL,
  `denumire` varchar(100) NOT NULL,
  `poza` varchar(100) NOT NULL,
  `adresa` varchar(150) NOT NULL,
  `descriere` varchar(1500) NOT NULL,
  `email_companie` varchar(100) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `id_locatie` int(11) NOT NULL,
  `telefon` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `companii`
--

INSERT INTO `companii` (`id_companie`, `denumire`, `poza`, `adresa`, `descriere`, `email_companie`, `parola`, `id_locatie`, `telefon`) VALUES
(16, 'Allied Testing MD', 'allied.png', 'bd.Moscova 114', 'Companie IT din Moldova', 'alliedtesting.md@gmail.com', '$2y$10$obKD4jmEtk0lfxTsuHSgeeo1f/oKykPMcxFCHgBvGK.WQzf8L6atO', 2, '+022 56 23 56'),
(17, 'Franzeluta', 'franzeluta.jpg', 'str.M.Dosoftei 160', 'Fabrica de panificatie nr.1 din Moldova', 'franzeluta@gmail.com', '$2y$10$6EaMRptrb5Lt6YMlBO.HM.3M6UI26h768ks0n9rO46AN9aMhFHRxy', 1, '022 59 12 12'),
(18, 'Zorile', 'zorile.png', 'str.Calea Iesilor 100', 'Brand de incaltaminte', 'zorilemoldova@gmail.com', '$2y$10$Cc.q.pXBP21kuy/3r0Qt4utYZSwfhqgRSS1qOxGfsNtN6qTCwI1t2', 1, ''),
(19, 'Mobiasbanca OTP Group', 'mobias.jpg', 'str. Stefan cel Mare 145', 'Un brand de top construit pe valori relevante, cu o reputație impecabilă în afaceri, sinonim cu  încredere și siguranță.\r\nToate aceste transformări și reușite au contribuit la capitalul de imagine al băncii și au condus la performanța de a deveni un brand autentic și recunoscut pe plan național.\r\nMobiasbanca a demonstrat de-a lungul anilor că merită încrederea clienţilor săi și aprecierea partenerilor externi, fiind o bancă care construiește relații de durată și mutual avantajoase.', 'mobias@gmail.com', '$2y$10$psJEyPvHGlCSQCPRA.7bTebq.Sirdcy45Hp8nUG5x//pNgZDWAnXy', 1, '+022 56 23 56'),
(20, 'Endava', 'images (1).png', 'Strada Arborilor 21a', 'Endava reimaginează relația dintre oameni și tehnologie. Am ajutat unele dintre cele mai importante companii de plăți, servicii financiare, telecomunicații, media, tehnologie, produse de larg consum, retail, mobilitate și asistență medicală din lume să-și accelereze capacitatea de a profita de noile modele de afaceri.', 'endava@gmail.com', '$2y$10$1ulhGoGeJmbbqubOvYTi2us7V.1BbHNpkURJzDShojbKVYo5jjWcC', 1, '+37360290996'),
(21, 'Coralclub', '2021_09_17_10_44_21_logo_3.png', 'Strada Tighina 3', 'Coral Club - este un producător și promotor de produse pentru un stil de viață sănătos, prezent pe piață de 20 ani, cu reprezentanțe în 38 de țări și livrări în toată lumea, cu milioane de consumatori satisfăcuți, cu specialiști tineri și talentați!\r\n\r\nCompania folosește metodologii inovatoare de cercetare și dezvoltare în domeniul suplimentelor și produselor de îngrijire corporală sau a casei.\r\n\r\nMisiunea companiei este de a îmbunătăți calitatea vieții și a sănătății.', 'coral@gmail.com', '$2y$10$IAIT388iz..I.O2dOXqNj.0gc7/RAmrY9gkPQw2GG.vStnH37dgqi', 9, '+37360289765'),
(22, 'Mantis', '2019_03_28_15_59_54_logo_3.png', 'Strada Florilor, 55', 'Compania, OCN Aventus Finance SRL este membră a grupului financiar internațional, Aventus Group\r\n\r\nLa moment compania gestionează 2 mărci comerciale: credit7.md și credit365.md\r\n\r\n\"Suntem un grup de furnizori inovatori de credite digitale care conduc progresul financiar al clienților din Europa și Asia, din 2009. Până în prezent, companiile Grupului Aventus au emis împrumuturi de până la 2 miliarde EURO. În prezent, companiile Grupului Aventus desfășoară afaceri cu succes în 14 țări.', 'mantis@gmail.com', '$2y$10$dM3cNhhes4Z/5WF0OIoT2enzeAqHLmikQrzfoRx.zKws.w9d46g8O', 1, '+37360289777'),
(23, 'Impuls Laser & Beauty', '2020_09_25_13_37_24_logo.jpg', 'Strada Tudor Vladimirescu, 16', 'Impuls Day & Night Beauty Studio va fi bucuros să primească angajați motivați și creativi care își îmbunătățesc mereu cunoștințele și își iubesc meseria!', 'impuls@gmail.com', '$2y$10$NgHdaZ4BZxEnekczb6Vn4eC5RuT0yFP8GojT9iTaWiE.DM13ufjyq', 1, '+37360123456'),
(26, 'Simplex', '2021_05_28_09_45_18_logo.jpg', 'Strada Mircea cel Batran, 3', 'Simplex - suntem o companie mereu în creștere, cu obiective coordonate de profesioniști și atmosferă favorabilă pentru obținerea succesului sigur și rapid.\r\nCu o echipă de peste 70 angajați, și experiență de peste 10 ani pe piață, compania Simplex prin competență și pasiune s-a recomandat atât la nivel național cât și internațional.', 'simplex@gmail.com', '$2y$10$sDRcyN54B0vazjiGTtAHRusfEJEDjp6aqFJFNuYlI5WLIofE1hpIW', 11, '+37360456712'),
(27, 'Tellyou SRL', '2019_03_22_16_18_33_logo_3.png', 'Strada Mihai Eminescu, 39', 'Cerinte:\r\n- Cunoașterea limbii Greacă;\r\n- Perseverenta, seriozitate, flexibilitate, atitudine proactiva, orientare către rezultate;\r\n- Vorbire coerentă și corectă;', 'tellyou@gmail.com', '$2y$10$Z95cesPXhcwnY702NAB5Xu0N9Gd/JC8e4bg1qPYcw1KRit//vX9g6', 5, '+37360123489'),
(28, 'International Travel Network', '2020_11_19_12_52_10_logo_3.png', 'Strada Studentilor,144', 'Un Agent de Turism trebuie să fie pasionat de industria călătoriilor, să iubească să construiască conexiuni între oameni și să fie orientat în mod firesc către rezolvarea problemelor altor persoane.\r\n\r\nNoi, la ITN Moldova căutăm oameni care cunosc limba engleză, iubesc să-i ajute pe alții, care sunt perseverenți, empatici și curioși.', 'travelnet@gmail.com', '$2y$10$pGE6lUWr2vV0/d2IKUN7N.52xomW7RXnIeYOT.ZmF/E9znjUJHUwS', 38, '+37369876515'),
(29, 'Nova Porta', '2021_04_06_17_32_55_logo.jpg', 'Strada Sfantul Gheorghe, 16', '\r\nNovaPorta este cel mai mare importator direct și dealer exclusiv al\r\ncelor mai renumite companii producatoare de usi exterioare și interioare din Ucraina și Rusia.\r\n\r\nLa moment suntem lideri pe piața locala având 13 showroom-uri în\r\nRepublica Moldova. Ne dezvoltăm rapid pe piata locala și avem drept scopextinderea pe întreg teritoriul Republicii Moldova.', 'nova@gmail.com', '$2y$10$Wy.vdD8pvIKkmy.e7.PYr.IdaN5ObGNHMlBtp5QTzD9CVz3rMOU3K', 29, '+37367858129'),
(30, 'Linella', '2019_03_29_15_27_01_logo_3.png', 'Strada Miorița, 76', 'LINELLA este o rețea națională de magazine, fondată la 17 octombrie 2001, promotor al comerțului modern în Republica Moldova de 20 ani și are cea mai mare extindere geografică, cu peste 120 de magazine, pe întreg teritoriul țării. Cu magazine prezente în peste 35 de localități, Linella are grijă să creeze cel puțin 20-25 de locuri de muncă, pentru ca localnicii să se bucure de siguranța zilei de mâine. ', 'linella@gmail.com', '$2y$10$3CVxII2Hbm7c8B43tHUDr.hWy0izxQFsSWwSHmp/Dg2A1YZmjm2/m', 31, '+37369876721'),
(31, 'Kentuky Fried Chicken (KFC)', 'image_15300113970.png', 'Strada Arborilor, 21a', 'La KFC suntem o echipă de peste 3000 de colegi, oameni ca tine. Tot ceea ce facem are la bază valorile echipei KFC: respect, corectitudine, încredere, comunicare deschisă, recunoaștere și dezvoltare continuă.', 'kfc@gmail.com', '$2y$10$9yG10klISAAYzJ4qfgOwi.kIErE3vlKJDP7CNvyP4LaHA1brvU51W', 1, '+37369876577'),
(32, 'Grafit Holding', 'image_15740807220.png', 'Strada Socoleni, 23', 'Grafit Holding este o companie moldovenească cu capital german și cu valori europene. Activitatea noastră constă în vânzarea supraproducției pe piețele europene și cea din SUA. Contribuim la soluționarea problemei de supraproducție, vânzând resursele deja existente pentru a nu produce altele noi, astfel demonstrând grija pentru mediul înconjurător.', 'grafit@gmail.com', '$2y$10$k5mCUO8leiLIkHOrsjsI.ewoG9zwey7hvrRlzLSqtJDJndqXDAXGC', 1, '+37367896519'),
(33, 'Banca Comercială Română Chișinău S.A.', '2016_03_24_13_41_26_logo.jpg', 'Strada Tricolorului, 67', 'Cladirea se afla in banca cu cladirea capitala in Moldova, BCR Chisinau. Membră a Erste (Austria), un grup financiar lider în Europa Centrală și de Est, BCR Chișinău este o bancă universală cu o strategie care vizează clienții corporativi și angajații și clienții acestora. BCR Chișinău a dezvoltat o rețea dinamică, cu o bună reputație în lume.', 'bcr@gmail.com', '$2y$10$eVhO1E3CnG9FUc5k.Pqf2eGyDbcseq3JwrNO0c58Nu0QFw8Koyum.', 1, '+37360289888'),
(34, 'Concordia Proiecte Sociale', '2019_04_04_15_07_27_logo_3.png', 'Strada Sfantul Mihail, 18', '- este o asociație umanitară și non-profit;\r\n- activează în Austria, Germania, Romania și Bulgaria;\r\n- prezentă în Republica Moldova din 2004;\r\n- își desfășoară activitatea pe tot teritoriul Republicii Moldova;\r\n- este avocatul săracilor și al orfanilor;\r\n- îngrijește anual de cca 4450 de beneficiari unici din familii social-vulnerabile.      ', 'concordia@gmail.com', '$2y$10$mngHzVSgi9In4gpJso342.Mac33..GX2Mwaa7Fr2X2oSLe7SgMtbW', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `experienta_prof`
--

CREATE TABLE `experienta_prof` (
  `id_user` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `perioada_inceput` date NOT NULL,
  `perioada_sfarsit` date NOT NULL,
  `denum_companie` varchar(40) NOT NULL,
  `descriere_exp` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `joburi`
--

CREATE TABLE `joburi` (
  `id_job` int(11) NOT NULL,
  `denum_job` varchar(150) NOT NULL,
  `id_categ_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `joburi`
--

INSERT INTO `joburi` (`id_job`, `denum_job`, `id_categ_job`) VALUES
(1, 'Web Developer', 1),
(2, 'Full Stack Developer', 1),
(3, 'Project Manager', 1),
(4, 'Traducător', 4),
(5, 'Social Media Manager', 6),
(6, 'Bucătar', 9),
(7, 'Ajutor de bucătar', 9),
(8, 'Psiholog ', 10),
(9, 'Cosmetolog', 7),
(10, 'Copywriter', 6),
(13, 'Personal tehnic', 11),
(14, 'UX/UI Designer', 8),
(15, 'Vanzator', 5),
(17, 'Operator bancar', 16),
(18, 'Asigurari', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `limbi`
--

CREATE TABLE `limbi` (
  `id_limba` int(11) NOT NULL,
  `limba` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `limbi`
--

INSERT INTO `limbi` (`id_limba`, `limba`) VALUES
(1, 'Română'),
(2, 'Rusă'),
(3, 'Engleză'),
(4, 'Turcă'),
(5, 'Spaniolă'),
(6, 'Franceză'),
(7, 'Portugheză'),
(8, 'Germană'),
(9, 'Italiană');

-- --------------------------------------------------------

--
-- Структура таблицы `limbi_users`
--

CREATE TABLE `limbi_users` (
  `id_user` int(11) NOT NULL,
  `id_limba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `locatie`
--

CREATE TABLE `locatie` (
  `id_locatie` int(11) NOT NULL,
  `raion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `locatie`
--

INSERT INTO `locatie` (`id_locatie`, `raion`) VALUES
(1, 'Chișinău'),
(2, 'Anenii Noi'),
(3, 'Bălți'),
(4, 'Basarabeasca'),
(5, 'Bender'),
(6, 'Briceni'),
(7, 'Cahul'),
(8, 'Călărași'),
(9, 'Cantemir'),
(10, 'Căușeni'),
(11, 'Ceadîr-Lunga'),
(12, 'Cimișlia'),
(13, 'Comrat'),
(14, 'Cricova'),
(15, 'Criuleni'),
(16, 'Dondușeni'),
(17, 'Drochia'),
(18, 'Dubăsari'),
(19, 'Edineț'),
(20, 'Fălești'),
(21, 'Florești'),
(22, 'Glodeni'),
(23, 'Hâncești'),
(24, 'Ialoveni'),
(25, 'Leova'),
(26, 'Leușeni'),
(27, 'Nisporeni'),
(28, 'Ocnița'),
(29, 'Orhei'),
(30, 'Rezina'),
(31, 'Râbnița'),
(32, 'Rîșcani'),
(33, 'Sângerei'),
(34, 'Șoldănești'),
(35, 'Soroca'),
(36, 'Ștefan Vodă'),
(37, 'Strășeni'),
(38, 'Taraclia'),
(39, 'Telenești'),
(40, 'Tiraspol'),
(41, 'Ungheni'),
(42, 'Vadul lui Vodă'),
(43, 'Vulcănești');

-- --------------------------------------------------------

--
-- Структура таблицы `skills`
--

CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL,
  `denumire_skill` varchar(80) NOT NULL,
  `id_categ_skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `skills`
--

INSERT INTO `skills` (`id_skill`, `denumire_skill`, `id_categ_skill`) VALUES
(1, 'Javascript', 1),
(2, 'PHP', 1),
(3, 'React.JS', 1),
(4, 'Putere de convingere', 8),
(5, 'CSS 3', 1),
(6, 'C1', 5),
(7, 'Public-speaking', 8),
(8, 'Canva', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `skills_user`
--

CREATE TABLE `skills_user` (
  `id_s` int(11) NOT NULL,
  `id_skill` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `skills_user`
--

INSERT INTO `skills_user` (`id_s`, `id_skill`, `id_user`) VALUES
(4, 2, 24),
(5, 3, 24),
(6, 4, 24),
(9, 4, 26),
(10, 4, 26),
(11, 5, 24),
(12, 3, 26),
(13, 1, 27),
(14, 5, 27),
(15, 7, 27),
(16, 5, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `poza` varchar(100) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `id_locatie` int(11) NOT NULL,
  `descriere_user` varchar(150) NOT NULL,
  `salariu_min_interesat` int(11) NOT NULL,
  `salariu_max_interesat` int(11) NOT NULL,
  `id_valuta` int(11) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `telefon` varchar(66) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `poza`, `nume`, `prenume`, `id_locatie`, `descriere_user`, `salariu_min_interesat`, `salariu_max_interesat`, `id_valuta`, `parola`, `email_user`, `telefon`) VALUES
(24, 'IMG_20200331_183613.jpg', 'Irina', 'Bacal', 1, 'Student la UTM', 500, 800, 2, '$2y$10$L0gn2ue4eq6gBs9bCZl.kuoMQ4brsAdE25tn.r6w6m6KsYk3XUM8K', 'irinabacal.1999@mail.ru', '+37369895623'),
(25, 'IMG_20200429_140718.jpg', 'Vasilache', 'Eugen', 18, 'Specialist finante si banci ', 6000, 10000, 1, '$2y$10$gBffzlWoFxenwiy2uHjuA.q88r3VoXxRICpIFBr1kdLa.yoMnDr1S', 'vasilache.e@gmail.com', ''),
(26, 'inculet.jpg', 'Inculet', 'Ana-Maria', 1, 'Psiholog', 8000, 10000, 1, '$2y$10$JQOx3nz14Pa1Ho2eVWearOIJiZjNwn9kAZDuFfu8RK8yE.IW5rjEu', 'inculet.ana@gmail.com', ''),
(27, 'IMG_8148.png.png', 'Covaliov', 'Elina', 1, 'Student anul 3, UTM, FCIM.\r\nSunt o persoana comunicativa, dinamica, hotarata, cu mare putere de concentrare,\r\nsociabila,care poate face fata oricarei ', 10000, 15000, 1, '$2y$10$xqtiPX/HqsyocgvpxllBWeoxS0jMww1s4m5AP50zuUT.nrWJJgUsS', 'elinacovaliov@gmail.com', '+37360280501'),
(28, '242924221_4485512401569507_3936181814606403115_n.jpg', 'Nagalisov', 'Liliana', 1, 'Student UTM, FCIM', 15000, 20000, 1, '$2y$10$NXrRxnveWNsdgaG2sL3UH.7HbJOIaqTuYo3k5jzYhCqKPk2XoTmfK', 'liliananagalisov@gmail.com', ''),
(29, '174391402_1863898103759896_3478698226381996391_n.jpg', 'Chetrușca', 'Mihaela', 1, 'Sunt studenta UTM, FCIM.', 600, 1800, 2, '$2y$10$nCAzr1KCg36fUKEf8xh9Je5WCm4.DR8PLubkM/G/0OEGeQ9EaNxwW', 'mihaelachetrusca@gmail.com', ''),
(30, '123055637_2764263223900744_4164430710891765016_n.jpg', 'Brăguța', 'Alexandrina', 1, 'Studenta UTM, FCIM.', 10000, 26000, 1, '$2y$10$lbV5WWG5Ups42ONY/9Ok8.RmwqQbdLsqY/kViLmIhUg9r6IIx1hfG', 'bragutaalexandrina@gmail.com', '');

-- --------------------------------------------------------

--
-- Структура таблицы `valuta`
--

CREATE TABLE `valuta` (
  `id_valuta` int(11) NOT NULL,
  `valuta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `valuta`
--

INSERT INTO `valuta` (`id_valuta`, `valuta`) VALUES
(1, 'MDL'),
(2, '€'),
(3, '$');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `anunturi_companie`
--
ALTER TABLE `anunturi_companie`
  ADD PRIMARY KEY (`id_anunt`),
  ADD KEY `id_companie` (`id_companie`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_valuta` (`id_valuta`),
  ADD KEY `id_categ_job` (`id_categ_job`),
  ADD KEY `id_locatie` (`id_locatie`);

--
-- Индексы таблицы `categ_joburi`
--
ALTER TABLE `categ_joburi`
  ADD PRIMARY KEY (`id_categ_job`);

--
-- Индексы таблицы `categ_skills`
--
ALTER TABLE `categ_skills`
  ADD PRIMARY KEY (`id_categ_skill`);

--
-- Индексы таблицы `companii`
--
ALTER TABLE `companii`
  ADD PRIMARY KEY (`id_companie`),
  ADD KEY `id_locatie` (`id_locatie`);

--
-- Индексы таблицы `experienta_prof`
--
ALTER TABLE `experienta_prof`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_job` (`id_job`);

--
-- Индексы таблицы `joburi`
--
ALTER TABLE `joburi`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_categ_job` (`id_categ_job`);

--
-- Индексы таблицы `limbi`
--
ALTER TABLE `limbi`
  ADD PRIMARY KEY (`id_limba`);

--
-- Индексы таблицы `limbi_users`
--
ALTER TABLE `limbi_users`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_limba` (`id_limba`);

--
-- Индексы таблицы `locatie`
--
ALTER TABLE `locatie`
  ADD PRIMARY KEY (`id_locatie`);

--
-- Индексы таблицы `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`),
  ADD KEY `id_categ_skill` (`id_categ_skill`);

--
-- Индексы таблицы `skills_user`
--
ALTER TABLE `skills_user`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `id_skill` (`id_skill`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_locatie` (`id_locatie`),
  ADD KEY `id_valuta` (`id_valuta`);

--
-- Индексы таблицы `valuta`
--
ALTER TABLE `valuta`
  ADD PRIMARY KEY (`id_valuta`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anunturi_companie`
--
ALTER TABLE `anunturi_companie`
  MODIFY `id_anunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `categ_joburi`
--
ALTER TABLE `categ_joburi`
  MODIFY `id_categ_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `categ_skills`
--
ALTER TABLE `categ_skills`
  MODIFY `id_categ_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `companii`
--
ALTER TABLE `companii`
  MODIFY `id_companie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `joburi`
--
ALTER TABLE `joburi`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `limbi`
--
ALTER TABLE `limbi`
  MODIFY `id_limba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `locatie`
--
ALTER TABLE `locatie`
  MODIFY `id_locatie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `skills_user`
--
ALTER TABLE `skills_user`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `valuta`
--
ALTER TABLE `valuta`
  MODIFY `id_valuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `anunturi_companie`
--
ALTER TABLE `anunturi_companie`
  ADD CONSTRAINT `anunturi_companie_ibfk_1` FOREIGN KEY (`id_companie`) REFERENCES `companii` (`id_companie`),
  ADD CONSTRAINT `anunturi_companie_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `joburi` (`id_job`),
  ADD CONSTRAINT `anunturi_companie_ibfk_3` FOREIGN KEY (`id_valuta`) REFERENCES `valuta` (`id_valuta`),
  ADD CONSTRAINT `anunturi_companie_ibfk_4` FOREIGN KEY (`id_categ_job`) REFERENCES `categ_joburi` (`id_categ_job`),
  ADD CONSTRAINT `anunturi_companie_ibfk_5` FOREIGN KEY (`id_locatie`) REFERENCES `locatie` (`id_locatie`);

--
-- Ограничения внешнего ключа таблицы `companii`
--
ALTER TABLE `companii`
  ADD CONSTRAINT `companii_ibfk_1` FOREIGN KEY (`id_locatie`) REFERENCES `locatie` (`id_locatie`);

--
-- Ограничения внешнего ключа таблицы `experienta_prof`
--
ALTER TABLE `experienta_prof`
  ADD CONSTRAINT `experienta_prof_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `experienta_prof_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `joburi` (`id_job`);

--
-- Ограничения внешнего ключа таблицы `joburi`
--
ALTER TABLE `joburi`
  ADD CONSTRAINT `joburi_ibfk_1` FOREIGN KEY (`id_categ_job`) REFERENCES `categ_joburi` (`id_categ_job`);

--
-- Ограничения внешнего ключа таблицы `limbi_users`
--
ALTER TABLE `limbi_users`
  ADD CONSTRAINT `limbi_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `limbi_users_ibfk_2` FOREIGN KEY (`id_limba`) REFERENCES `limbi` (`id_limba`);

--
-- Ограничения внешнего ключа таблицы `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id_categ_skill`) REFERENCES `categ_skills` (`id_categ_skill`);

--
-- Ограничения внешнего ключа таблицы `skills_user`
--
ALTER TABLE `skills_user`
  ADD CONSTRAINT `skills_user_ibfk_1` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`),
  ADD CONSTRAINT `skills_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_locatie`) REFERENCES `locatie` (`id_locatie`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_valuta`) REFERENCES `valuta` (`id_valuta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
