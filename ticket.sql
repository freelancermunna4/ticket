-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 06:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickets4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(255) NOT NULL,
  `logo_text` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Name',
  `img` varchar(255) NOT NULL DEFAULT 'img.png',
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Admin',
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `logo_text`, `name`, `img`, `phone`, `pass`, `role`, `time`) VALUES
(6, 'Dashboard', 'Admin', '279898054_460186332543908_6542258482236105019_n.jpg', 'bangladeshisoftware@gmail.com', '5bd0d5938d678fad7f2b2719a8050ef5', 'Admin', 1664187567);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `category_des`) VALUES
(10, 'Javascrpt', 'software like Aldus PageMaker including versions of Lorem Ipsum.'),
(11, 'Python', 'software like Aldus PageMaker including versions of Lorem Ipsum.'),
(12, 'c', 'software like Aldus PageMaker including versions of Lorem Ipsum.'),
(13, 'c#', 'software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` int(255) NOT NULL,
  `smtp_user_name` varchar(255) NOT NULL,
  `smtp_user_pass` varchar(255) NOT NULL,
  `smtp_security` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_replay_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `smtp_host`, `smtp_port`, `smtp_user_name`, `smtp_user_pass`, `smtp_security`, `site_email`, `site_replay_email`) VALUES
(1, 'mail.bddonation.com', 465, 'support@bddonation.com', '@ZyPc..&TeDs', 'ssl', 'support@bddonation.com', 'support@bddonation.com');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `admin_img` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `ticket_id` int(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` longtext NOT NULL,
  `option` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `reply_message` longtext NOT NULL,
  `reply_file` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `user_time` int(255) NOT NULL,
  `admin_time` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `refarence` int(255) NOT NULL,
  `solved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `user_name`, `user_id`, `admin_name`, `user_img`, `admin_img`, `admin_id`, `ticket_id`, `extra`, `subject`, `phone`, `option`, `message`, `reply_message`, `reply_file`, `file_name`, `status`, `user_time`, `admin_time`, `time`, `refarence`, `solved`) VALUES
(554, 'hasan', '111', '', 'logo.png', '', '', 437626203, '', 'sdf', '1234', 'PHP', '<p>sdfsfdf</p>', '', '', '', 'Pending', 1664188096, 0, 1664188096, 709667941, 'true'),
(555, 'hasan', '111', '', 'logo.png', '', '', 313063851, '', 'sdfdsf', '1234', 'Javascrpt', '<p>sdfdsf</p>', '', '', 'img.png', 'Answered', 1664188268, 0, 1664188268, 642333375, 'true'),
(556, '', '', 'Admin', '', '279898054_460186332543908_6542258482236105019_n.jpg', '6', 313063851, '', '', '', '', '', '<p>sdfsdfsdf</p>', 'logo.png', '', 'Answered', 0, 1664188290, 0, 0, ''),
(557, 'Name', '117', '', 'img.png', '', '', 471473021, '', 'aaaaaa', 'dd', 'Javascrpt', '<p><b>sfsdfsfsdf sdf sfds fs</b>&nbsp;fsdfsf<img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABiVBMVEWE0Pf///+qOS3lmXMtLS23elx8IRqha1F9zveH1f2F0vl8zfckJCRjGhW6fF3om3QnHxmJ0vemKRkqJiPol23w+f6n3fnu+P4pJCErKSggJyp+0/244/rE6Pv4/P/nmG+V1vjT7fwmGxPck27MiGerMyPj9P3I6ft8weTd8f2d2fisLRdPcIFGXmseJyrCgmLQi2mdaE/gm3nFraamTEh6JB/euLW3XFNzsdFdiqFwq8k/UVo5REtqoLxWfZExNDaTZlCCXEmegHOgeGWiZEOnvc6dw9nIq6HSpZGNsM2TnLSiYGSbgZCJOTWoQjp2Egzt2dfr1NLBdW727OvXqqbOlZCjHAAiDgAgAABEW2dHSkxPPzg7NTKGZ1lkSz+4j31yU0NYUEx+bGXDi3G1gmqDdGxnYFx3gYlRNie3tbmZkpPYoISSq7uZkZGwucOnnZ2slY1+YGyQUj1hDQCSp8F8BwCLSkRlMzaAeYpkIyGec3yXjqGkWVuEQT6iY2iRPjm+b2jIhoC2WlLt/1PrAAASKElEQVR4nO2d+V8TSRqHOyEh6QZzESAXIQQaAoEQI/cVUFQQCSqiq7COI+zsrrjOoeOs16j85Vt9pNNHVXdVdXXC7MfvL8NAaPvhfet937o53/+7uE6/gOf6TvjX13dCJsr3D06OTAzlcgOqcrmhkcnxwf52/OMeE+bHR3JThTgX7gnL4iQpX4JvcfHCQG5k3NtX8JBwfGIgrlEhJX0iPjDkHaY3hPnx3JRkI2yBDxdyk554rQeE/SMDcRK6FiU35YEtWRPmJwocBZ1GGY7nGEMyJcyPTDk1OxxIjikkQ8LxnBvrGSB7CkPM2iQzwpGCe/PpIbkBRoZkRDgRZ4mnMIYLIyxejQVhfoip+VrqiQ/lLwFhfohV84MozLlmdE3ogX8aGeNDHSWc9JhPZuRGOkY4OOU9n6SewmRnCHMeBRiIwgPU+ZGecLwNDqpD5GibIy1hPtdOPkk9BboSgJKwvQZUFc61j7DtBlQRC4PtIcy3KYTCGCfaQTjeKTwZcYC0xiEnnOiYARXEOGHAISYc6CwgR+yphIT5TsRQC+KAd4SD8U7TyQpPETRGIsLJdmIIAvpn4Th+2iAhHOlpGxzPl5Y4G0SOw443BITtCqICzy1t1B8/nuHtPtWD293AJxwiBBRk2RsCyldaXium0oHUtC0hF8ZExCYkAgReBtxsZWVpqcTxsiRWJ1hB+uzKTCCWDgAVlxw+Hx5hSkhQiQq8UFpeTcVUBdZmNpbXV5Y42aw83yQWmkaWJX2LK61PB2J9AVl99k6Kj4hJOIQdZEArWl8tKmZQlO4DtMXi41R9bXVmenpjY3l5fR0gl3RaWV/emKkXYyntt1IlZ//GQsQjxA8yAgdakQ5Pr3Q63deXApJMWwSKxVJ9Kr/8pe6zxWVHE2IiYhFipwmBX1qLIfiIFNP5qOTBSETncINDOIlrQYHbeMyCL5BabeFxS9N/20Ai9jjmRQzCQUw+ji+txljwBdKrSpKREv/yarHPNnE4DVE5E+Zxa1G+VO9jAhiIKSmmtLK8mpacPmbXKAsONaozYQHTR/lSgImHBiQbbmxMP6n3xVLKE23janjKJSFuf1Ao1VkBAkQQcNPa4xyqG4fOlBMhbikjcGuMXNSqmENqtO8SOxBih1F+mk2QgajYiqQI0rBdQLUn7Mfk4/iVoleAqScaII9ijNtEG3vCAiYg8FF2jdComJYaeW6j+ATeIu2ijS0hdrnNL3vlo8UZ1WwCvyKVSwgj9qBnNewICWoZhnHUoGYmBL3GGbkcRDZF5LCGDSF2qvfOhOkZpavFrcwUpVCdXkPmjQIFIf7IKO+VCQN9q9NS8g8UlVRkkxmR0zZoQvxxJ2HJs0Aq5/6U9vd7bNPvR6UMJGEelw+YcCNl95Ls1LdqV9zECQkJRu95z1KFSTHboRuEn6IIRwgGnkrt4QvE0N1EBREaT1GEBMP3wlJ7nLRvzeFF4HkfQUgyySt4V7HplQ44jk31jGATDpKM3wvrnhXdRkDnsSlYsIETThEAAsI22DAdWMIYfOuB9KOghNjlmkK44r0N03UMCwKFMQkLJICgd+95suirY4wPy4TWjAEjJMkUkkp1jwFTa5iAQJaeIoyQcKKXX/aYMLWKD2g1IoSQcBoN9H7XPAWMPSGaojMbEUJI6KM8CKVelm2xaaIpSIsRrYSkM6H8TF9gzTs/LW6QzrE6EhIvt5CyoWdGTC3zhITmsUULIelsPS9XNHWPEOu4aUKnuAMhqQn5abn77Q1ivf54HSvT62WaVDQTEq8o4dXZivrTDHPAtUBvzGG9AkxTtoQF0seV1JKt8kOIMWK93guEHntCythPNBGOk5pQK0qfRqNjxwwZMwpgb6BETpizIRwgfRqvdp0y14e7oqObJ8wYt36UAXudpmVgiqMJ88TLnvhlpYNfOY92AcTgVoAFY+U4NPv3ikxoN7yGkmG9lJGQNNtr42zppwBQ0mxw6yTjEjJzshmJBEP0hNwAkrBA/CyVMPNCJYyOBSNXn7kxZCawFYwEgY4lwLTj0iiYelCE4+Rr81QvrfygEgJPjYAX3KSFzGSeK3zByAsJ0GEEESF9SjQQUmwyUCPNWq1JKHtqEHjZ5nGF2F0zmWcqH3jEZqUXfCtNEWkMbqonxJ+KaUnJFukfay1A2YwSZGTzGVGbzASea3xAZ1I5n66TZwtJeSjhJMUKWUHO+FozVBG7xhQzRCKhreNABYcyUzne0vMFx6LHAdvZJjvp1krpCWmW4Quc1A4r1w2Ekhlng01I0ChPHCAzlZPnIQPf7Gg0+qIXa4kilDAHJaRaAyzPrFVOTYQ6RtWUz6RWBm16mcCzrZD0lzDwgSfcAJ9POYzko1SAEdI4qdIBDtTPLYQGRgkyEtrcenZ8IhksIwvY9eTk+PmmiU7lA79/VgE9/HWaQKOvTXWEdNu15PnfkxqEUGIc0797REYJha5uyroaCsnfMuJFxkabqfW84jTdZEM4ASGk20shj+n/CAWUY47OkC1OVUGLZke7tEdFaxIh8UJxVQNWQop0LxOWioHen1CEKiSEBaLZapcxJFdoQymnq75bhOQ1qULIgZb1DxtCBbJqTxmZHRvtMj8kuhboo+gAKwr3WwiJZmP0iKvpjDlZQCAlyjEYJoCrjko/t/7O07Ttukt7whEzIU1BIwvU3pkbjoSqLYFGR6vV6pikanV0VPs27OM/9RZXKJthKyNqhMS9e41wOVbBJGwZVJHTxwAhXc0mqWAmpGyG8lqTyhkZIe4f4qfeOm0obU20aYTE4xeaSgHvCKkDTSvna4T0OwuFVVIvxSakDzSt4rtJSD5C01Q2/s9nHtnwxb9WHDdLoQmHjIR0RakE+Lo27BgzKAmDoe0bu1laxAEjIW2gyf476Q2eRBgC2t6lddSCkZAy0IRvJb3iA4RXJcQQbcKIGwlpA835sHeEXTLh9ktaI/YbCCmLUi9N2DWq2HCbMieq6UIlHKQjzF7z0kmrKuErOkJ15FslJFsj1CKE9e2ZEc6qhC/pwqlae6uEpEtomoReOmk0ohCGrlMSTugJaQ+c8ZQwqACGblAS5vSEtOd5eEnYFWJJSNn9zXrYDLtGm4SUXqoWNSphgZJwx7t02Ayl9AlxSk9ImfBBzeYdYTPQbO9SVt8sCD3N+E0nDdF2L/SE1IM0gnduOurWSdXSWyHE3mdolneVd3RMJQzFaW3IhNC7uq2ZDbdfUXfz9YTYW+4h8qp3oQL+h34cgxGhUDj3wopqrtj+hX4YwxBp3NhQiO8kh6PDSbamjAa3Ad/2SxeAzAg5IXvr9vnOzdcsTRntEl5dv/6yRD1IYyakjzSywlmgOMsKLnkty2ezpItnTdJXbf3uHiUre5uhnyZvuX+jsJ6QOuPrH8gwNQ7vMDhXzNC3YEHICew6/MmbDJzK2HtiQZhlFmui5wxex9THL7B4JMeqISZfu4qhqozjNLQTwAax6kuBVMHiddTN3S5HMYyKI6dzicTGhBxnGC9lc/QxGyNGayzeRTvwxN1ooklCHL5yiEysTGict6BcTGMWi3A6fM6kFWrbLlTCfkYndzLIiclbbN6luRjD3cyM9bGuC5vkbTY+qq1saxIW2DwWVKfuEKNRVkcVm+fxWR1i7TbYJG8yMqG27KtJyOwI3exNN0Zk5qOcttOy+V/qJVEWuRmbitaoB9YsmjIR0q82sapGXZ+yiqNca7FJa8VQgdWjOeHWMGVTZJXrJWl7nzRChldW0DbF5DV2gFw4byZkU7cpoqtPkzvs3kC3WF8jdDkYZRRNVhw+Zxdl9BsuWmuEC+weL83YkCIOMwyjnH4LYouQ6d0xAkeIOFzDPQkWU/1WQsoFJwgRIibPGV+c0drP7Xq/BUqCQNAWkztMXVSXDQ2E9KuE4cIvboZv0y92hkt3AJ+OkGW+kJW9hlncVBlb0LCb2/XeNRtlf57F6GhEa6cRFgPAeul35Bv2H7L9Zzjuh2Cw5khYCwYjPzMsZiTpT4l0u4fURkJJ2iFzamtGYEB54wxjQv2RA4adzoyj6StlDxCasckXjDCYatLJcGyE273cNsruNHc5ncJ8NdrV5GPupoajP9zux0dKyMaT1dbGu1rNsKAf4FX1GxPPslk389kmGY5vMZ6pwGT6QhCEbDZ+6/XOcFQPMXs6WpN3PHXVatVT077LyC+vbpUkShaYxiN4jISuU6J0YQxXeH3tPJmUly6Yd+NBN46qP4ic/fyqJN1S45bSeH656fQWV7FGkK7buPPrQTWpdfJH4TwIRSK/vfn1v0ucO0jTeWYmQuodbPJtG2/vfv7994ODd60WFyVDPHt/5c2bN3/8d5fL0jOajqI1EVIOSAl8Nn5nr1H2z3cDHeh250erzlwtG767Ium9v9z48FagjT2mk2jN50RRJAzJOe/sPSqLfr9/XyLs3tdlBwLESEgGvLIPHiSWyx92OZrlJuabZ8yE5BsveG73gyjjATUUI+5FqRDfqyZUJJYbd3cFYkjz4eyW89rIhveFbOnjXBPPrxnx4IwCUfXRK3Otp4mJT3c4sqV7lrOELYQERgTuCcyX8OvVUBC7T4kRI5syX/e+4Xli2X+3RGJHy/n61nMTsS+W4bm3nx6JfpPm5tWmqEfEiKhNwPmG+Yniow+72IzWW7yshP14PQwQXQzuafbTz4Z623J2hAUw9F4B/AJ5pFj+E5fRekUC5PxSnHDK8wg+FKJ6Jg8S8KoC2A0DlBvkHhYj5N5HCKHznQEC/xbkPpTUpnhgcFT1aCVbFwX+vY98qljGYYTccgE7R9hhLhHEl09ovhZi97xpAzQ64GwpfDaAMuOHkkOpA7uFDXratW11ypc+oPzTjNh91WhGuKtGzj4rfN37lihjYhQ/2uYO6N1WUEKbLoYgfPQ78OkQDz6fmrqFVWtvY/P9FTX+OgACJRpv7cwIu2UOfuo8KmMI2d05Wwe1WPFgz9T1NZ47FAmG/nijfhQRZEx69CfydPYw9MIgOCFieQ3P3bUmQIT251XE+aunFkjpIBegsbGzzyoePE3AJPrvIEpySJhBEkLvHQURZi7h/AZNfdHMOP/u9Nx0kol8tEnt7F2TD8dDNZX3oGZEXPaIusGjYAUU7jpFGKMaTTNKkHvBc+3QFnkk4zT0rvuA2ICKRPGtNXGgLgtCEVrKU75knyKcGA8O9t/9Fjo7Oz09Owv99m7+QMPrnicxoKLyB8tMB+IiHSShubefvYMRQq2aazHKlE21vknDB5SYM+3FQN65iiQ0+KnA3yU2oKrG/n63jfa/0PD5ZU/V5w3khVY2hLp4KsT3aAElfdmfn4fRze9/mXP+baTKd3WE8DhqT9jK+3xpjsZDdWrMAUq9w4L/+dxwgycj/qk1RvTFcnaEzbyf3aVqglbMRuOLKvA1iycmPqnHt0IvCcIgVOrT7FsmfJ5IbMiZ0fauVVtCaWyR//io0xw2EhPSAT3oRuhE6JsMZy81IJC4m7XeLYNP6Bv66CaItkXiW/uruR0IfQ8IKtHOqPzQnsCJ0Pfp8sYZWYkjBwBHQp/bXOitEt+c3t+Z8PAyIya+Or6/M6Evf3kRxUXn18cgvLyI4qJtnsAn9OUvLmVEFecwAPEIffmvlxARDxCT0Of7dukyP5aLEhD6ji4ZIkYUJST0LVwqxMQD3PfGJ/TdY9NNZCLHSoaK0He4eFniTcKhFqUlvDTxRrxP8M5khL6FS9BbFBuHJK9MSOi71+i0p+LHGDpC4KmdRSRpgpSEvoVE52Kq2CBpgrSEvsOO1XBlQg+lJQRm7EhqFP0LFO9KR+g7fND+vFF+QBRDXRL6fPf97XVVMUFjQDeEoBZvY8QRncdjPCBso6smFu9Rv6UbQuCqF+1gTDQoHZQBoRRVvW6OInGOZ0sIGD2t4xJ+/H6SV4Q+38MLskUaJHwPqTIEa0Jgx0XslUT4ElnwsSIEMecr49whJhbdxJeWWBGC3HHUYOaswHzf6PODUewIgRYeJFhEnUT56wID91TFlBAYcuHikStIMfHogkXra4kxIdDhw0U/ZZsEzrnI0HqK2BP6JEt+u0iQUYpiQlw8us8az+cRoSRA2SjjYYqJsvj1iLnxVHlGKOnw/sNvjQSQCAMVgd2kny0eLbCKmzB5Sqjo8P7C0YPFi0bDryABXtHfaFwsPjhauH/PI8u11AbCpg4PD+8pAl95DqapjYQd0nfCv76+E/719T8GLtNV3fQQsQAAAABJRU5ErkJggg==\" data-filename=\"sdfdf.png\" style=\"width: 225px;\">&nbsp;sdf ssfdfs</p><p>sdfsfsdf</p><p><br></p><p>sd</p><p>fs</p><p>fsd</p>', '', '', '', 'Pending', 1665136264, 0, 1665136264, 845661412, ''),
(558, 'user_name', 'user_id', 'admin_name', 'user_img', 'admin_img', 'admin_id', 1, 'extra', 'subject', 'phone', 'option', 'message', 'reply_message', 'reply_file', 'file_name', 'Pending', 2, 2, 2, 1, 'solved'),
(559, 'user_name', 'user_id', '', 'user_img', '', '', 1, '', 'subject', 'phone', 'option', 'message', '', '', 'file_name', 'Pending', 2, 0, 2, 1, ''),
(560, 'Name', '117', '', 'img.png', '', '', 577368942, '', 'sfsdf', 'dd', 'Javascrpt', '<p>sfsdf</p>', '', '', '', 'Pending', 1665224810, 0, 1665224810, 517207495, ''),
(561, 'Name', '117', '', 'img.png', '', '', 631521350, '', 'aaaaaa', 'dd', 'Javascrpt', '<p>aa</p>', '', '', '', 'Pending', 1665224831, 0, 1665224831, 665419054, ''),
(562, 'Name', '117', '', 'img.png', '', '', 278163849, '', 'ddd', 'dd', 'c', '<p>ddd</p>', '', '', '', 'Pending', 1665224939, 0, 1665224939, 617632117, ''),
(563, 'Name', '117', '', 'img.png', '', '', 332433603, '', 'ss', 'dd', 'Javascrpt', '<p>sss</p>', '', '', '', 'Pending', 1665224988, 0, 1665224988, 93436222, ''),
(564, 'Name', '117', '', 'img.png', '', '', 251359774, '', 'ss', 'dd', 'Javascrpt', '<p>sss</p>', '', '', '', 'Pending', 1665225001, 0, 1665225001, 347983063, ''),
(565, 'Name', '117', '', 'img.png', '', '', 197054158, '', 'sdfs', 'dd', 'Javascrpt', '<p>sfdf</p>', '', '', '', 'Pending', 1665225012, 0, 1665225012, 531474768, ''),
(566, 'user_name', 'user_id', '', 'user_img', '', '', 1, '', 'subject', 'phone', 'option', 'message', '', '', 'file_name', 'Pending', 2, 0, 2, 1, ''),
(567, 'user_name', '25', '', 'user_img', '', '', 1, '', 'subject', 'phone', 'option', 'message', '', '', 'file_name', 'Pending', 2, 0, 2, 1, ''),
(568, 'user_name', '25', '', 'user_img', '', '', 1, '', 'subject', 'phone', 'option', 'message', '', '', 'file_name', 'Pending', 2, 0, 2, 1, ''),
(569, 'Name', '117', '', 'img.png', '', '', 719816467, '', 'aa', 'dd', 'Javascrpt', '<p>aa</p>', '', '', '', 'Pending', 1665225960, 0, 1665225960, 624874033, ''),
(570, 'Munna', '98', '', '279898054_460186332543908_6542258482236105019_n.jpg', '', '', 279543695, '', 'dd', 'bangladeshisoftware@gmail.com', 'Javascrpt', '<p>aaa</p>', '', '', '', 'Pending', 1667712627, 0, 1667712627, 717631927, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL DEFAULT 'Name',
  `lname` varchar(255) NOT NULL DEFAULT 'Last Name',
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Country',
  `address` varchar(255) NOT NULL DEFAULT 'Address',
  `city` varchar(255) NOT NULL DEFAULT 'City',
  `zip` varchar(255) NOT NULL DEFAULT 'Zip',
  `birth` varchar(255) NOT NULL DEFAULT '00/00/0000',
  `facebook` varchar(255) NOT NULL DEFAULT 'Facebook',
  `twitter` varchar(255) NOT NULL DEFAULT 'Twitter',
  `nid_type` varchar(255) NOT NULL,
  `nid_number` int(255) NOT NULL DEFAULT 0,
  `nid_info` varchar(255) NOT NULL,
  `nid_front` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'img.png',
  `phone` longtext NOT NULL,
  `pass` longtext NOT NULL,
  `gmail_verify` varchar(255) NOT NULL,
  `nid_verify` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  `verificode` int(11) NOT NULL,
  `nid_time` int(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `fname`, `lname`, `email`, `country`, `address`, `city`, `zip`, `birth`, `facebook`, `twitter`, `nid_type`, `nid_number`, `nid_info`, `nid_front`, `img`, `phone`, `pass`, `gmail_verify`, `nid_verify`, `time`, `verificode`, `nid_time`, `role`) VALUES
(98, 'Munna', '', 'bangladeshisoftware@gmail.com\r\n\r\n', '', '', '', '', '', '', '', 'passport', 59885685, 'Amar nid original..', 'img.png', '279898054_460186332543908_6542258482236105019_n.jpg', 'bangladeshisoftware@gmail.com', '5bd0d5938d678fad7f2b2719a8050ef5', 'verified', 'verified', 1667713562, 5255452, 1667713562, 'Admin'),
(117, 'Name', 'Last Name', '', 'Country', 'Address', 'City', 'Zip', '00/00/0000', 'Facebook', 'Twitter', '', 0, '', '', 'img.png', 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', '', '', 1667713562, 0, 1667713562, ''),
(118, 'Name', 'Last Name', '', 'Country', 'Address', 'City', 'Zip', '00/00/0000', 'Facebook', 'Twitter', '', 0, '', '', 'img.png', 'aa', '4124bc0a9335c27f086f24ba207a4912', '', '', 1667713562, 0, 1667713562, '');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logo_text` varchar(255) NOT NULL,
  `f_text` varchar(255) NOT NULL,
  `ticket_time` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `logo`, `logo_text`, `f_text`, `ticket_time`, `facebook`, `twitter`, `youtube`, `linkedin`, `time`) VALUES
(1, 'logo.png', 'Support Desk', 'Support Desk.. 2019 All rights reserved.', 'Support working hours: Monday  Friday: 10.00am  - 10.00pm.', 'https://web.facebook.com/bangladeshisoftware', 'twitter.com', 'https://www.youtube.com/c/BangladeshiSoftware', 'linkedin.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
