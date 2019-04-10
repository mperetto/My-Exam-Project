-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 19, 2018 alle 15:09
-- Versione del server: 5.7.17
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lavori`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket`
--

CREATE TABLE `ticket` (
  `ticket_ID` int(11) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `via` varchar(50) NOT NULL,
  `mq` int(10) NOT NULL,
  `Descrizione` varchar(500) NOT NULL,
  `prezzo` float NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ticket`
--

INSERT INTO `ticket` (`ticket_ID`, `provincia`, `via`, `mq`, `Descrizione`, `prezzo`, `ID`) VALUES
(1, 'biella', 'fere, 21', 88, 'splendido appartamento in centro cittÃ , con fantastica veduta in centro, comprensivo di ampia sala, 2 camere da letto e un bagno.', 180000, 1),
(2, 'vercelli', 'poli, 25', 65, 'casa singola con frutteto e giardino, 3 piani, veranda, 3 camere da letto, 2 bagni e garage con due posti macchina.', 83200, 1),
(4, 'torino', 'dario, 37', 125, 'ampio attico situato in centro, con cucina, 2 camere da letto, 2 bagni, riscaldamento autonomo.', 197000, 1),
(5, 'verbania', 'giu, 14', 44, 'ampia casa in collina, ottima vista, 2 bagni, 3 camere da letto, ampio frutteto, comprensiva di garage.', 112000, 2),
(6, 'gallarate', 'greppe, 22a', 55, 'ottimo monolocale perfetto per una o due persone, completamente arredato e ristrutturato da poco.', 96000, 2),
(8, 'moncalvo', 'dante, 42', 56, 'casa in campagia comprensiva di frutteto, ampio garage, 4 camere da letto 2 bagni, rustico necessario di piccoli interventi di ristrutturazione.', 62500, 1),
(9, 'novara', 'appia, 23', 66, 'appartamento situato in periferia con 1 camera da letto, un bagno, e garage con un posto macchina.', 46000, 1),
(10, 'cuneo', 'roma, 33', 115, 'ampia villa in collina con bellissima veduta sulla cittÃ .', 160000, 1),
(11, 'biella', 'pozzo, 54', 99, 'ampio appartamento situato in centro, necessita di ristrutturazioni.\r\ncomprensivo di 3 camere da letto due bagni e due sale.', 77300, 1),
(12, 'gallarate', 'quinto, 12', 56, 'casa a schiera centrale con 2 camere da letto un bagno e ampia sala.', 94000, 1),
(13, 'novara', 'settimo, 23', 62, 'appartamento con 3 camere da letto, due bagni, ampia cucina, e un\'ampia sala.', 98000, 1),
(14, 'cuneo', 'via senda, 23', 66, 'casa singola in centro paese con ampio terrazzo, 2 posti macchina, mansarda, appena ristrutturato.', 128630, 2),
(15, 'vercelli', 'via colle, 20', 53, 'ampio appartamento all\'interno di bellissimo contesto cittadino, con due camere da letto ed un bagno.', 92300, 2),
(16, 'verbania', 'appio, 16', 61, 'villetta a schiera situata in periferia, luogo molto tranquillo ottimo per il relax e per lavorare.', 65800, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `username`, `password`) VALUES
(1, 'marco.peretto', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'luca.carbo', '674f3c2c1a8a6f90461e8a66fb5550ba');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_ID`),
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
