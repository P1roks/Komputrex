-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Komputrex
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(7,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lowered_price` decimal(7,2) DEFAULT NULL,
  `type` enum('pc','part','peri') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(1,'AMD Ryzen 7 3700x','3700x.png',999.99,'Czerpiąc z nowatorskiej architektury Zen 2, procesor AMD Ryzen 7 3700X dysponuje olbrzymią mocą obliczeniową. Pozwól działać potędze 8 rdzeni i 16 wątków wspartych przez 36 MB pamięci cache. Bazowe taktowanie rdzeni liczy 3,60 GHz, a w trybie Turbo przyspiesza do 4,40 GHz, obsługując bezbłędnie każdą grę, każdy program i każdy proces. Potęgę jednostki Ryzen 7 3700X zwiększysz jeszcze bardziej, korzystając z odblokowanego mnożnika.',NULL,'part','Częstotliwość taktowania procesora: 3.6 GHz\nLiczba rdzeni: 8\nOdblokowany mnożnik: Tak\nTyp gniazda: Socket AM4\nTyp gniazda: Socket AM4'),
(2,'Mysz gamingowa razer DeathAdder V2','deathadder.png',299.99,'W rywalizacji liczy się bezlitosna skuteczność. To właśnie zapewnia najlepsza w tej klasie ergonomia połączona z sensorem i przełącznikami nowej generacji. Poznaj najnowszą wersję myszki Razer DeathAdder V2, która odmieni losy rozgrywki. Wyposażona w przełączniki optyczne Razer zapewnia aktywacje z szybkością światła. Przewód Razer Speedflex gwarantuje płynność ruchu i minimalny opór. Natomiast wbudowana pamięć pozwala na korzystanie z ustawień w dowolnym miejscu.',149.99,'peri','Czułość: 20000 DPI\nLiczba przycisków: 8,8\nMaksymalna czułość: 2000 DPI\nPodświetlenie: RGB\nRodzaj myszy: Bezprzewodowe,Przewodowe i bezprzewodowe\nRodzaj sensora: Optyczny\nSensor myszy: Optyczny'),
(3,'MSI GeForce RTX 3060 GAMING X 12GB GDDR6','msi3060.png',2700.00,'Oparta o architekturę NVIDIA Ampere karta graficzna MSI GeForce RTX 3060 GAMING X zapewnia wydajność, cichą pracę i design, które zadowolą najbardziej hardkorowych graczy. Dzięki wsparciu technologii takich jak Ray Tracing czy DLSS możesz cieszyć się płynną rozgrywką z fotorealistyczną grafiką na wysokim poziomie detali i FPS. Wydajny układ chłodzenia z dwoma wentylatorami zadba o optymalne temperatury pracy a podświetlenie RGB pozwoli nadać konfiguracji wyjątkowego blasku.',NULL,'part','Długość karty: 276 mm\nIlość pamięci RAM: 12 GB\nRodzaj chipsetu: GeForce RTX 3060\nTaktowanie rdzenia w trybie boost: 1837 MHz\nŁączenie kart: Nie'),
(4,'OmniPC | Ryzen 5 5600G , 8GB DDR4, 256GB SSD, Astral','omnipc.png',2500.00,'Gotowy zestaw komputerowy to idealne rozwiązanie dla tych, którzy nie posiadając odpowiedniej wiedzy, nie chcą ryzykować samodzielnym doborem podzespołów, czy późniejszym złożeniem ich w poprawnie funkcjonującą jednostkę. Niestety tzw. gotowce często są również pułapką zastawioną na tych najmniej doświadczonych użytkowników, którzy nęceni wybitnie atrakcyjną ceną zupełnie nie dostrzegają, że część komponentów jest bardzo słabej jakości bądź po prostu przestarzała, w efekcie czego zamykają sobie drogę do ewentualnej rozbudowy czy modernizacji nowo kupionej maszyny.',2199.99,'pc','Płyta główna: Msi B550M A-PRO\nObudowa: KRUX Astral ARGB Tempered Glass\nProcesor: Procesor AMD RYZEN 5600G, OEM\nChłodzenie procesora: BOX\nGPU: Radeon™ AMD Radeon Vega 3\nZasilacz: SilentiumPC Elementum E2 SI 350W (SPC196)*\nRAM: HyperX, DDR4, 8 GB (2x4gb), 3200MHz, CL16\nDysk SSD: Patriot 256GB 2,5\" SATA SSD P210\nOS: Windows 10 Home (nieaktywowany)'),
(5,'Oculus Quest 2','quest2.png',2399.00,'Przeglądaj niesamowite gry i materiały z niezrównaną swobodą używając gogli VR Oculus Quest 2, w wariancie z wbudowaną pamięcią 128 GB. Te łatwe w konfiguracji, kompatybilne z VR na komputerze gogle zostały wyposażone w szybki procesor Qualcomm Snapdragon XR2 i grafikę nowej generacji.',NULL,'peri','Rozdzielczość ekranu: 3664 x 1920\nCzęstotliwość odświeżania: 90 Hz\nDźwięk: wbudowany\nMikrofon: wbudowany\nPamięć wbudowana: 128 GB\nGwarancja: 24 miesiące (gwarancja producenta)\nKompatybilność: PC'),
(6,'Monitor Xiaomi Mi Desktop 1C','x1c.png',699.90,'Niezależnie od tego, czy korzystasz z monitora w domu, czy w biurze, warto zadbać o komfort oczu. Ekran Xiaomi Mi Desktop 1C nie tylko zapewnia wystarczającą przestrzeń roboczą do wygodnej pracy, ale też posiada wysoką rozdzielczość. W efekcie rewelacyjnie sprawdzi się zarówno podczas wpisywania danych w programach, jak i podczas oglądania filmów. Co więcej, nowoczesna konstrukcja urządzenia stanowi eleganckie uzupełnienie każdego miejsca pracy.',500.00,'peri','Kolor: Czarny\nModel: RMMNT238NF\nWyświetlacz: 23,8 cali\nRozdzielczość ekranu: 1920 x 1080 \nCzęstotliwość odświeżania ekranu: 75 Hz'),
(7,'Apple iMac 24 M1','imac.png',7000.00,'Inspirowany wszystkim, co najlepsze w Apple. Wewnętrznie odmieniony przez czip M1. Zrobi wrażenie, gdziekolwiek go postawisz. I różnicę, cokolwiek na nim zrobisz.Piękna konstrukcja w siedmiu kolorach◊ odmieni każdą przestrzeń. A zajmie jej niedużo, bo ma zaledwie 11,5 mm grubości i waży niecałe 5 kg.',NULL,'pc','Procesor: Apple M1 (8 rdzeni, ARM)\nPamięć RAM: 8 GB (pamięć zunifikowana)\nPrzekątna ekranu: 23,5\"\nRozdzielczość ekranu: 4480 x 2520 (4.5K)\nKarta graficzna: Apple M1 (7 rdzeni)\nDysk SSD PCIe: 256 GB\nWbudowane napędy optyczne: Brak'),
(8,'Klawiatura Logitech K120','k120.png',69.99,'Skonstruowana w klasycznym stylu, prosta i wygodna. Popraw ergonomię swojej pracy, wybierając klawiaturę Logitech K120. Przemyślana konstrukcja pozwala na wygodną pracę, nie męczy nadgarstków i dłoni. Cały dzień pisania w biurze czy wieczorne rozmowy ze znajomymi na czacie - teraz to wszystko wykonasz lekko i wygodnie.',59.99,'peri','Rodzaj przełączników: Membranowe\nTyp: Niskoprofilowa, Klasyczna\nŁączność: Przewodowa\nInterfejs: USB\nKlawisze numeryczne: Tak\nKlawisze multimedialne / funkcyjne: Nie\nObsługa makr: Nie\nPodświetlenie klawiszy: Nie');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_cart` (
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
INSERT INTO `shopping_cart` VALUES
(1,2,5),
(1,1,6);
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Surename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Janusz','Sram','Janusz.Sram@gmail.com','96e966d7a273217d190e79ad810de0a3',0),
(3,'tur','t','uyt','569ef72642be0fadd711d6a468d68ee1',0),
(4,'root','1','root','7b24afc8bc80e548d66c4e7ff72171c5',0),
(6,'ggg','gggg','g@gmail.com','202cb962ac59075b964b07152d234b70',0),
(7,'Marcel','Maciaszczyk','maciszczyk.marcel@gmail.com','202cb962ac59075b964b07152d234b70',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-13 21:58:53
