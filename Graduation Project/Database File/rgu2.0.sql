-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 12:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgu`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question`, `option1`, `option2`, `option3`, `option4`, `right_ans`, `question_type`, `question_topic`) VALUES
(1, 'Which of the following is not a valid C variable name?', 'int number;', 'float rate;', 'int variable_count;', 'int $main;', 'int $main;', 'medium', 'Variables in C Programming'),
(2, 'All keywords in C are in ', 'LowerCase letters', ' UpperCase letters', 'CamelCase letters', 'None of the mentioned', 'LowerCase letters', 'easy', 'Keywords in C'),
(3, 'Which of the following is true for variable names in C', 'They can contain alphanumeric characters as well as special characters', ' It is not an error to declare a variable to be one of the keywords(like goto, static)', 'Variable names cannot start with a digit', ' Variable can be of any length', 'Variable names cannot start with a digit', 'hard', 'Variables in C Programming'),
(4, ' What is short int in C programming', 'The basic data type of C', 'Qualifier', 'Short is the qualifier and int is the basic data type', 'All of the mentioned', 'Short is the qualifier and int is the basic data type', 'hard', 'Variables in C Programming'),
(5, 'What is the full form of DBMS', 'Data of Binary Management System', 'Database Management System', 'Database Management Service', ' Data Backup Management System', 'Database Management System', 'easy', 'Database Management System'),
(6, 'What is a database', 'Organized collection of information that cannot be accessed, updated, and managed', 'Collection of data or information without organizing', 'Organized collection of data or information that can be accessed, updated, and managed', ' Organized collection of data that cannot be updated', 'Organized collection of data or information that can be accessed, updated, and managed', 'medium', 'Database Management System'),
(7, 'Which type of data can be stored in the database', 'Image oriented data', 'Text, files containing data', 'Data in the form of audio or video', 'All of the above', 'All of the above', 'hard', 'Database Management System'),
(8, 'What does PoP stand for', 'Pre Office Protocol', 'Post Office Protocol', 'Protocol of Post', 'None', 'Post Office Protocol', 'medium', 'Mail Protocols'),
(9, 'What is the number of layers in the OSI model', '2 layers', '4 layers', '7 layers', '9 layers', '7 layers', 'hard', 'OSI Model'),
(10, 'The full form of OSI is', 'Operating System Interface', 'Optical System Interconnection', 'Operating System Internet', 'Open System Interconnection', 'Open System Interconnection', 'hard', 'OSI Model');

-- --------------------------------------------------------

--
-- Table structure for table `rtable`
--

CREATE TABLE `rtable` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `question_number` int(11) DEFAULT NULL,
  `right_ans` varchar(255) DEFAULT NULL,
  `given_ans` varchar(255) DEFAULT NULL,
  `correct` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `total_score` int(11) DEFAULT NULL,
  `total_percentage` float DEFAULT NULL,
  `simple_percentage` float DEFAULT NULL,
  `medium_percentage` float DEFAULT NULL,
  `hard_percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rtable`
--

INSERT INTO `rtable` (`id`, `student_name`, `question_number`, `right_ans`, `given_ans`, `correct`, `topic`, `total_score`, `total_percentage`, `simple_percentage`, `medium_percentage`, `hard_percentage`) VALUES
(538, 'Nabin', 1, 'int $main;', 'int $main;', 1, 'Variables in C Programming', 7, 70, 100, 66.6667, 60),
(539, 'Nabin', 2, 'LowerCase letters', 'LowerCase letters', 1, 'Keywords in C', 7, 70, 100, 66.6667, 60),
(540, 'Nabin', 3, 'Variable names cannot start with a digit', 'Variable names cannot start with a digit', 1, 'Variables in C Programming', 7, 70, 100, 66.6667, 60),
(541, 'Nabin', 4, 'Short is the qualifier and int is the basic data type', 'Short is the qualifier and int is the basic data type', 1, 'Variables in C Programming', 7, 70, 100, 66.6667, 60),
(542, 'Nabin', 5, 'Database Management System', 'Database Management System', 1, 'Database Management System', 7, 70, 100, 66.6667, 60),
(543, 'Nabin', 6, 'Organized collection of data or information that can be accessed, updated, and managed', 'Organized collection of data or information that can be accessed, updated, and managed', 1, 'Database Management System', 7, 70, 100, 66.6667, 60),
(544, 'Nabin', 7, 'All of the above', 'All of the above', 1, 'Database Management System', 7, 70, 100, 66.6667, 60),
(545, 'Nabin', 8, 'Post Office Protocol', 'Pre Office Protocol', 0, 'Mail Protocols', 7, 70, 100, 66.6667, 60),
(546, 'Nabin', 9, '7 layers', '4 layers', 0, 'OSI Model', 7, 70, 100, 66.6667, 60),
(547, 'Nabin', 10, 'Open System Interconnection', 'Optical System Interconnection', 0, 'OSI Model', 7, 70, 100, 66.6667, 60);

-- --------------------------------------------------------

--
-- Table structure for table `smaterial`
--

CREATE TABLE `smaterial` (
  `tid` int(11) NOT NULL,
  `topic` varchar(900) NOT NULL,
  `explaination` varchar(7000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smaterial`
--

INSERT INTO `smaterial` (`tid`, `topic`, `explaination`) VALUES
(13, 'Variables in C Programming', 'A variable is a name of the memory location. It is used to store data. Its value can be changed, and it can be reused many times.  It is a way to represent memory location through symbol so that it can be easily identified.\r\nRules for defining variables:\r\n\r\nA variable can have alphabets, digits, and underscore.\r\nA variable name can start with the alphabet, and underscore only. It can\'t start with a digit.\r\nNo whitespace is allowed within the variable name.\r\nA variable name must not be any reserve.\r\nRules for defining variables\r\n\r\nA variable can have alphabets, digits, and underscore.\r\nA variable name can start with the alphabet, and underscore only. It can\'t start with a digit.\r\nNo whitespace is allowed within the variable name.\r\nA variable name must not be any reserved word or keyword, e.g. int, float, etc.\r\nTypes of Variables in C\r\nThere are many types of variables in c:\r\n\r\nlocal variable\r\nglobal variable\r\nstatic variable\r\nautomatic variable\r\nexternal variable\r\nLocal Variable\r\nA variable that is declared inside the function or block is called a local variable.\r\nGlobal Variable\r\nA variable that is declared outside the function or block is called a global variable. Any function can change the value of the global variable. It is available to all the functions.'),
(14, 'Keywords in C', 'Keywords in C Programming\r\nauto	break	case	char\r\nconst	continue	default	do\r\ndouble	else	enum	extern\r\nfloat	for	goto	if\r\nint	long	register	return\r\nshort	signed	sizeof	static\r\nstruct	switch	typedef	union\r\nunsigned	void	volatile	while\r\nDescription of all Keywords in C\r\nauto\r\nThe auto keyword declares automatic variables. For example:\r\n\r\nauto int var1;\r\nThis statement suggests that var1 is a variable of storage class auto and type int.\r\n\r\nVariables declared within function bodies are automatic by default. They are recreated each time a function is executed.\r\n\r\nSince automatic variables are local to a function, they are also called local variables. To learn more visit C storage class.\r\n\r\nbreak and continue\r\nThe break statement terminates the innermost loop immediately when it\'s encountered. It\'s also used to terminate the switch statement.\r\n\r\nThe continue statement skips the statements after it inside the loop for the iteration.\r\n\r\nfor (i=1;i<=10;++i){\r\n   if (i==3)\r\n   continue;\r\n   if (i==7)\r\n   break;\r\n   printf(\"%d \",i);\r\n} \r\nOutput\r\n\r\n1 2 4 5 6\r\nWhen i is equal to 3, the continue statement comes into effect and skips 3. When i is equal to 7, the break statement comes into effect and terminates the for loop. To learn more, visit C break and continue statement\r\n\r\nswitch, case and default\r\nThe switch and case statement is used when a block of statements has to be executed among many blocks. For example:\r\n\r\nswitch(expression)\r\n{\r\n    case \'1\':\r\n    //some statements to execute when 1\r\n    break;\r\n    case \'5\':\r\n    //some statements to execute when 5\r\n    break;\r\n    default:\r\n    //some statements to execute when default;\r\n}\r\nVisit C switch statement to learn more.\r\n\r\nchar\r\nThe char keyword declares a character variable. For example:\r\n\r\nchar alphabet;\r\nHere, alphabet is a character type variable.\r\n\r\nTo learn more, visit C data types.\r\n\r\nconst\r\nAn identifier can be declared constant by using the const keyword.\r\n\r\nconst int a = 5;\r\nTo learn more, visit C variables and constants.\r\n\r\ndo...while\r\nint i;\r\ndo \r\n{\r\n   printf(\"%d \",i);\r\n   i++;\r\n}\r\nwhile (i<10)\r\nTo learn more, visit C do...while loop\r\n\r\ndouble and float\r\nKeywords double and float are used for declaring floating type variables. For example:\r\n\r\nfloat number;\r\ndouble longNumber;\r\nHere, number is a single-precision floating type variable whereas, longNumber is a double-precision floating type variable.\r\n\r\nTo learn more, visit C data types.\r\n\r\nif and else\r\nIn C programming, if and else are used to make decisions.\r\n\r\nif (i == 1)\r\n   printf(\"i is 1.\")\r\nelse\r\n   printf(\"i is not 1.\")\r\nIf the value of i is other than 1, the output will be :\r\n\r\ni is not 1\r\nTo learn more, visit C if...else statement.\r\n\r\nenum\r\nEnumeration types are declared in C programming using keyword enum. For example:\r\n\r\nenum suit\r\n{\r\n    hearts;\r\n    spades;\r\n    clubs;\r\n    diamonds;\r\n};\r\nHere, an enumerated variable suit is created having tags: hearts, spades, clubs, and diamonds.\r\n\r\nTo learn more, visit C enum.\r\n\r\nextern\r\nThe extern keyword declares that a variable or a function has external linkage outside of the file it is declared.\r\n\r\nTo learn more, visit C storage type.\r\n\r\nfor\r\nThere are three types of loops in C programming. The for loop is written in C programming using the keyword for. For example:\r\n\r\nfor (i=0; i< 9;++i){\r\n  printf(\"%d \",i);\r\n}\r\nOutput\r\n\r\n0 1 2 3 4 5 6 7 8\r\nTo learn more, visit C for loop.\r\n\r\ngoto\r\nThe goto statement is used to transfer control of the program to the specified label. For example:\r\n\r\nfor(i=1; i<5; ++i)\r\n{\r\n    if (i==10)\r\n    goto error;\r\n}\r\nprintf(\"i is not 10\");\r\nerror:\r\n    printf(\"Error, count cannot be 10.\");\r\nOutput\r\n\r\nError, count cannot be 10.\r\nTo learn more, visit C goto.\r\n\r\n'),
(15, 'Database Management System', 'A database management system (DBMS) is system software for creating and managing databases. A DBMS makes it possible for end users to create, protect, read, update and delete data in a database. The most prevalent type of data management platform, the DBMS essentially serves as an interface between databases and users or application programs, ensuring that data is consistently organized and remains easily accessible.\r\nWhat does a DBMS do?\r\n\r\nThe DBMS manages the data; the database engine allows data to be accessed, locked and modified; and the database schema defines the database\'s logical structure. These three foundational elements help provide concurrency, security, data integrity and uniform data administration procedures. The DBMS supports many typical database administration tasks, including change management, performance monitoring and tuning, security, and backup and recovery. Most database management systems are also responsible for automated rollbacks and restarts as well as logging and auditing of activity in databases and the applications that access them.\r\n\r\nThe DBMS provides a centralized view of data that can be accessed by multiple users from multiple locations in a controlled manner. A DBMS can limit what data end users see and how they view the data, providing many views of a single database schema. End users and software programs are free from having to understand where the data is physically located or on what type of storage medium it resides because the DBMS handles all requests.\r\n\r\nThe DBMS can offer both logical and physical data independence to protect users and applications from having to know where data is stored or from being concerned about changes to the physical structure of data. So long as programs use the application programming interface (API) for the database that the DBMS provides, developers won\'t have to modify programs just because changes have been made to the database.\r\n'),
(16, 'Mail Protocols', 'Email protocols are a collection of protocols that are used to send and receive emails properly. The email protocols provide the ability for the client to transmit the mail to or from the intended mail server. Email protocols are a set of commands for sharing mails between two computers. Email protocols establish communication between the sender and receiver for the transmission of email. Email forwarding includes components like two computers sending and receiving emails and the mail server. There are three basic types of email protocols.\r\nTypes of Email Protocols:\r\nThree basic types of email protocols involved for sending and receiving mails are:\r\n\r\nSMTP\r\nPOP3\r\nIMAP\r\nTypes of Email Protocol\r\n \r\n\r\nSMTP (Simple Mail Transfer Protocol):\r\nSimple Mail Transfer Protocol is used to send mails over the internet. SMTP is an application layer and connection-oriented protocol. SMTP is efficient and reliable for sending emails. SMTP uses TCP as the transport layer protocol. It handles the sending and receiving of messages between email servers over a TCP/IP network. This protocol along with sending emails also provides the feature of notification for incoming mails. When a sender sends an email then the sender’s mail client sends it to the sender’s mail server and then it is sent to the receiver mail server through SMTP. SMTP commands are used to identify the sender and receiver email addresses along with the message to be sent.\r\n\r\nSome of the SMTP commands are HELLO, MAIL FROM, RCPT TO, DATA, QUIT, VERIFY, SIZE, etc. SMTP sends an error message if the mail is not delivered to the receiver hence, reliable protocol.  \r\n\r\nFor more details please refer to the Simple Mail Transfer Protocol (SMTP) article.\r\n\r\nPOP(Post Office Protocol):\r\nPost Office Protocol is used to retrieve email for a single client. POP3 version is the current version of POP used. It is an application layer protocol. It allows to access mail offline and thus, needs less internet time. To access the message it has to be downloaded. POP allows only a single mailbox to be created on the mail server. POP does not allow search facilities\r\n\r\nSome of the POP commands are LOG IN, STAT, LIST, RETR, DELE, RSET, and QUIT. For more details please refer to the POP Full-Form article.\r\n\r\nIMAP(Internet Message Access Protocol):\r\nInternet Message Access Protocol is used to retrieve mails for multiple clients. There are several IMAP versions: IMAP, IMAP2, IMAP3, IMAP4, etc. IMAP is an application layer protocol. IMAP allows to access email without downloading them and also supports email download. The emails are maintained by the remote server. It enables all email operations such as creating, manipulating, delete the email without reading it. IMAP allows you to search emails. It allows multiple mailboxes to be created on multiple mail servers and allows concurrent access. Some of the IMAP commands are: IMAP_LOGIN, CREATE, DELETE, RENAME, SELECT, EXAMINE, and LOGOUT.'),
(17, 'OSI Model', 'OSI stands for Open Systems Interconnection. It has been developed by ISO ? ?International Organization for Standardization?, in the year 1984. It is a 7-layer architecture with each layer having specific functionality to perform. All these 7 layers work collaboratively to transmit the data from one person to another across the globe.\r\nLayers of OSI Model\r\nPhysical Layer\r\nData Link Layer\r\nNetwork Layer\r\nTransport Layer\r\nSession Layer\r\nPresentation Layer\r\nApplication Layer\r\nLayer 1- Physical Layer\r\nThe lowest layer of the OSI reference model is the physical layer. It is responsible for the actual physical connection between the devices. The physical layer contains information in the form of bits. It is responsible for transmitting individual bits from one node to the next. When receiving data, this layer will get the signal received and convert it into 0s and 1s and send them to the Data Link layer, which will put the frame back together.  \r\n\r\nData Bits in the Physical Layer\r\nData Bits in the Physical Layer\r\n\r\nThe Functions of the Physical Layer\r\nBit synchronization: The physical layer provides the synchronization of the bits by providing a clock. This clock controls both sender and receiver thus providing synchronization at the bit level.\r\nBit rate control: The Physical layer also defines the transmission rate i.e. the number of bits sent per second.\r\nPhysical topologies: Physical layer specifies how the different, devices/nodes are arranged in a network i.e. bus, star, or mesh topology.\r\nTransmission mode: Physical layer also defines how the data flows between the two connected devices. The various transmission modes possible are Simplex, half-duplex and full-duplex.\r\nNote: 1. Hub, Repeater, Modem, and Cables are Physical Layer devices. \r\n\r\n             2. Network Layer, Data Link Layer, and Physical Layer are also known as Lower Layers or Hardware Layers.\r\n\r\nLayer 2- Data Link Layer (DLL)\r\nThe data link layer is responsible for the node-to-node delivery of the message. The main function of this layer is to make sure data transfer is error-free from one node to another, over the physical layer. When a packet arrives in a network, it is the responsibility of the DLL to transmit it to the Host using its MAC address. \r\nThe Data Link Layer is divided into two sublayers:  \r\n\r\nLogical Link Control (LLC)\r\nMedia Access Control (MAC)\r\nThe packet received from the Network layer is further divided into frames depending on the frame size of the NIC(Network Interface Card). DLL also encapsulates Sender and Receiver’s MAC address in the header. \r\n\r\nThe Receiver’s MAC address is obtained by placing an ARP(Address Resolution Protocol) request onto the wire asking “Who has that IP address?” and the destination host will reply with its MAC address.  \r\n\r\nThe Functions of the Data Link Layer\r\nFraming: Framing is a function of the data link layer. It provides a way for a sender to transmit a set of bits that are meaningful to the receiver. This can be accomplished by attaching special bit patterns to the beginning and end of the frame.\r\nPhysical addressing: After creating frames, the Data link layer adds physical addresses (MAC addresses) of the sender and/or receiver in the header of each frame.\r\nError control: The data link layer provides the mechanism of error control in which it detects and retransmits damaged or lost frames.\r\nFlow Control: The data rate must be constant on both sides else the data may get corrupted thus, flow control coordinates the amount of data that can be sent before receiving an acknowledgment.\r\nAccess control: When a single communication channel is shared by multiple devices, the MAC sub-layer of the data link layer helps to determine which device has control over the channel at a given time.\r\nFunction of DLL\r\nFunction of DLL\r\n\r\nNote: 1. Packet in the Data Link layer is referred to as Frame. \r\n\r\n           2. Data Link layer is handled by the NIC (Network Interface Card) and device drivers of host machines. \r\n\r\n           3. Switch & Bridge are Data Link Layer devices.\r\n\r\nLayer 3- Network Layer\r\nThe network layer works for the transmission of data from one host to the other located in different networks. It also takes care of packet routing i.e. selection of the shortest path to transmit the packet, from the number of routes available. The sender & receiver’s IP addresses are placed in the header by the network layer. \r\n\r\nThe Functions of the Network Layer \r\nRouting: The network layer protocols determine which route is suitable from source to destination. This function of the network layer is known as routing.\r\nLogical Addressing: To identify each device on Internetwork uniquely, the network layer defines an addressing scheme. The sender & receiver’s IP addresses are placed in the header by the network layer. Such an address distinguishes each device uniquely and universally.\r\nNote: 1. Segment in the Network layer is referred to as Packet. \r\n\r\n          2. Network layer is implemented by networking devices such as routers.  \r\n\r\nLayer 4- Transport Layer\r\nThe transport layer provides services to the application layer and takes services from the network layer. The data in the transport layer is referred to as Segments. It is responsible for the End to End Delivery of the complete message. The transport layer also provides the acknowledgment of the successful data transmission and re-transmits the data if an error is found.\r\n\r\nAt the sender’s side: The transport layer receives the formatted data from the upper layers, performs Segmentation, and also implements Flow & Error control to ensure proper data transmission. It also adds Source and Destination port numbers in its header and forwards the segmented data to the Network Layer. \r\n\r\nNote: The sender needs to know the port number associated with the receiver’s application. \r\n\r\nGenerally, this destination port number is configured, either by default or manually. For example, when a web application requests a web server, it typically uses port number 80, because this is the default port assigned to web applications. Many applications have default ports assigned. \r\n\r\nAt the receiver’s side: Transport Layer reads the port number from its header and forwards the Data which it has received to the respective application. It also performs sequencing and reassembling of the segmented data. \r\n\r\nThe Functions of the Transport Layer \r\nSegmentation and Reassembly: This layer accepts the message from the (session) layer, and breaks the message into smaller units. Each of the segments produced has a header associated with it. The transport layer at the destination station reassembles the message.\r\nService Point Addressing: To deliver the message to the correct process, the transport layer header includes a type of address called service point address or port address. Thus by specifying this address, the transport layer makes sure that the message is delivered to the correct process.\r\nServices Provided by Transport Layer \r\nConne');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `mobile`) VALUES
(4, 'Nabin', 'nabin123@gmail.com', 'nabin321', 'Student', '9547848762'),
(5, 'Tanmoy', 'tanmoy1232@gmail.com', 'tanmoy321', 'Teacher', '9547848976');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `rtable`
--
ALTER TABLE `rtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smaterial`
--
ALTER TABLE `smaterial`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rtable`
--
ALTER TABLE `rtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

--
-- AUTO_INCREMENT for table `smaterial`
--
ALTER TABLE `smaterial`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
