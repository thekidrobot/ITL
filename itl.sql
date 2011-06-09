# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.5.12
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2011-06-09 19:34:42
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table itl.article
DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_article` varchar(20) NOT NULL,
  `type_article` char(1) DEFAULT NULL,
  `title_article` varchar(100) DEFAULT NULL,
  `content_article` longtext,
  `content_plain` longtext,
  `status_article` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

# Dumping data for table itl.article: 16 rows
DELETE FROM `article`;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `date_article`, `type_article`, `title_article`, `content_article`, `content_plain`, `status_article`) VALUES
	(1, '2011/06/06 10:08:50', 'A', 'Our Profile', '<h1>Our Profile</h1>\r\n<p><img alt="" class="flt_lft" src="images/about_us_pix.jpg"></p>\r\n<p>Intercontinental Trust Limited (&quot;ITL&quot;) is licenced by the Mauritius Financial Services Commission to provide a comprehensive range of financial and fiduciary services to international businesses. We endeavour to provide at all times first class service to our clients in structuring their international affairs and using Mauritius as a base for international transactions.</p>\r\n<p>&nbsp;</p>\r\n<p>The Company is an independent member of Baker Tilly International. Baker Tilly International is a leading worldwide network of high quality, independent accountancy and business advisory firms, all of whom are committed to providing the best possible service to their clients, both in their own marketplaces and across the world, wherever the client needs help.<br>\r\n	<br>\r\n	Baker Tilly International is the world&#39;s 8th largest accountancy and business advisory network by combined fee income of its independent members. It is represented by 150 independent firms in 120 countries with combined fee income of US$3.07bn and 25,000 people worldwide.</p>\r\n', 'Our Profile\r\n\r\nIntercontinental Trust Limited (&quot;ITL&quot;) is licenced by the Mauritius Financial Services Commission to provide a comprehensive range of financial and fiduciary services to international businesses. We endeavour to provide at all times first class service to our clients in structuring their international affairs and using Mauritius as a base for international transactions.\r\n&nbsp;\r\nThe Company is an independent member of Baker Tilly International. Baker Tilly International is a leading worldwide network of high quality, independent accountancy and business advisory firms, all of whom are committed to providing the best possible service to their clients, both in their own marketplaces and across the world, wherever the client needs help.\r\n	\r\n	Baker Tilly International is the world&#39;s 8th largest accountancy and business advisory network by combined fee income of its independent members. It is represented by 150 independent firms in 120 countries with combined fee income of US$3.07bn and 25,000 people worldwide.\r\n', 1),
	(33, '2011-05-26 01:18:03', 'A', 'Our Directors', '<h1>Our Directors</h1>\r\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\r\n<p>\r\n<b>BEN LIM, FCA TEP - Chief Executive Officer</b><br/><br/>\r\nBen Lim is fellow of the Institute of Chartered Accountants in England & Wales\r\nand has a great deal of experience in international tax planning. Until April\r\n2000, he was an international tax and offshore services Partner in the Mauritian\r\nrepresentative firm of Andersen Worldwide, s.c. (De Chazal Du Mée) and a\r\ndirector of a leading trust company in Mauritius. \r\n<br/><br/>\r\nBen is also a member of the following bodies:\r\n<br/><br/>\r\n<ul>\r\n<li>Asia Offshore Association (Founder Member and International Director)</li>\r\n<li>Society of Trust and Estate Practitioners and</li>\r\n<li>International Fiscal Association</li>\r\n</ul>\r\n<br/><br/>\r\n<b>TOMMY LO, BSc FCA TEP - Chief Operations Officer</b>\r\n<br/><br/>\r\nTommy Lo is a fellow of the Institute of Chartered Accountants in England &\r\nWales. He worked for seven years in the UK specialising in auditing and\r\ntaxation. In 1989 he joined, as finance director, the Jade group, a major local\r\nGroup involved in activities as varied as property, financial services, trading\r\nand leisure. He was responsible for the diversification of the group into the\r\nfinancial services sector. He is a licensed stockbroker operating on the Stock\r\nExchange of Mauritius.\r\n<br/><br/>\r\nTommy is also a member of the following bodies:\r\n<br/><br/>\r\n<ul>\r\n<li>Society of Trust and Estate Practitioners</li>\r\n<li>International Fiscal AssociationAsia Offshore Association</li>\r\n</ul>\r\n<br/><br/>\r\n<b>RICHARD N. WILSON, BA TEP - Executive Director</b>\r\n<br/><br/>\r\nRichard Wilson holds a BA in Economics and History from the University of\r\nStirling, Scotland. \r\n<br/><br/>\r\nHe was been working in the banking and finance industry since 1979, with\r\nexperience in the United Kingdom, Australia, Hong Kong and Singapore. \r\n<br/><br/>\r\nHis experience with the Mauritius Offshore Industry dates from 1997 after nearly\r\nnine years as Manager of an Australian bank in Hong Kong. He is a member of the\r\nSociety of Trust & Estate Practitioners. \r\n<br/><br/>\r\n<b>YAN NG, MSc ACA TEP - Executive Director</b>\r\n<br/><br/>\r\nYan Ng is an Associate of the Institute of Chartered Accountants\r\nin England & Wales. He is in charge of the Fund Administration\r\noperations and advises clients on all fund related aspects\r\nincluding tax and regulatory matters and the structuring and the\r\nestablishment of funds in Mauritius. Yan is board member of a\r\nnumber of Mauritian funds. Yan has previously acted as an audit\r\nmanager with Baker Tilly Mauritius and as a senior auditor with\r\nDeloitte in Luxembourg. \r\n<br/><br/>\r\nYan is also a member of the following bodies:\r\n<br/><br/>\r\n<ul>\r\n<li>International Fiscal Association (Treasurer)</li>\r\n<li>Association of Trust and Management Companies (Executive member)</li>\r\n<li>Society of Trust and Estate Practitioners</li>\r\n</ul>\r\n<br/><br/>\r\n<b>FRANCOISE CHAN, MSc  DEA TEP - Executive Director</b>\r\n<br/><br/>\r\nFrançoise Chan is an Executive Director of Intercontinental Trust Ltd.\r\n<br/><br/>\r\nShe holds a "Diplome d\'Etudes Approfondies" (D.E.A.) in Banking and\r\nFinance and a "Maitrise" in Econometrics from the University of Paris 1\r\nSorbonne, France. She also holds a "Magistere d\'Economie" delivered by the same\r\nuniversity in conjunction with L\'Ecole Normale Superieure (Ulm) et L\'E.H.E.S.S.\r\n(L\'Ecole des Hautes Etudes en Sciences Sociales) of Paris France.\r\n<br/><br/>\r\nFrançoise has been in the Global Business Sector since 1994 and acquired\r\nextensive experience working in a leading Management Company as well as in the\r\nGlobal Business Division of an International Bank.\r\n<br/><br/>\r\nFrançoise is a member of the following bodies:\r\n<br/><br/>\r\n<ul>\r\n<li>Society of Trust and Estate Practitioners; </li>\r\n<li>International Fiscal Association</li>\r\n<br/><br/> TEDDY LO, ACA - Finance Director\r\n<br/><br/> \r\nTeddy Lo currently occupies the position of Finance Director\r\nand was previously Manager in the Fund Administration department of\r\nIntercontinental Trust Ltd. He is a member of the Institute of Chartered\r\nAccountants in England & Wales and the Canadian Institute of Chartered\r\nAccountants. He holds a Mauritius Stockbrokers Examination Certificate.\r\n<br/><br/> He worked for six years in a firm of Chartered Accountants in London\r\nwhere his areas of responsibilities were auditing, accounting and taxation. He\r\nalso worked for Deloitte in Mauritius where he was involved in the listing of a\r\nmajor local bank on the Mauritius Stock Exchange. He spent the last eleven years\r\nin Canada and gathered valuable experience in the field of accounting and\r\nfinance in North America.\r\n<br/><br/> Teddy has attended various conferences in\r\nthe field of International finance and taxation and is currently pursuing the\r\nChartered Business Valuators designation. \r\n</p>\r\n<br/><br/>', 'BEN LIM, FCA TEP - Chief Executive Officer\r\n\r\nBen Lim is fellow of the Institute of Chartered Accountants in England & Wales and has a great deal of experience in international tax planning. Until April 2000, he was an international tax and offshore services Partner in the Mauritian representative firm of Andersen Worldwide, s.c. (De Chazal Du Mée) and a director of a leading trust company in Mauritius.\r\n\r\nBen is also a member of the following bodies:\r\n\r\nAsia Offshore Association (Founder Member and International Director)\r\nSociety of Trust and Estate Practitioners and\r\nInternational Fiscal Association\r\n\r\nTOMMY LO, BSc FCA TEP - Chief Operations Officer\r\n\r\nTommy Lo is a fellow of the Institute of Chartered Accountants in England & Wales. He worked for seven years in the UK specialising in auditing and taxation. In 1989 he joined, as finance director, the Jade group, a major local Group involved in activities as varied as property, financial services, trading and leisure. He was responsible for the diversification of the group into the financial services sector. He is a licensed stockbroker operating on the Stock Exchange of Mauritius.\r\n\r\nTommy is also a member of the following bodies:\r\n\r\nSociety of Trust and Estate Practitioners\r\nInternational Fiscal AssociationAsia Offshore Association\r\n\r\nRICHARD N. WILSON, BA TEP - Executive Director\r\n\r\nRichard Wilson holds a BA in Economics and History from the University of Stirling, Scotland.\r\n\r\nHe was been working in the banking and finance industry since 1979, with experience in the United Kingdom, Australia, Hong Kong and Singapore.\r\n\r\nHis experience with the Mauritius Offshore Industry dates from 1997 after nearly nine years as Manager of an Australian bank in Hong Kong. He is a member of the Society of Trust & Estate Practitioners.\r\n\r\nYAN NG, MSc ACA TEP - Executive Director\r\n\r\nYan Ng is an Associate of the Institute of Chartered Accountants in England & Wales. He is in charge of the Fund Administration operations and advises clients on all fund related aspects including tax and regulatory matters and the structuring and the establishment of funds in Mauritius. Yan is board member of a number of Mauritian funds. Yan has previously acted as an audit manager with Baker Tilly Mauritius and as a senior auditor with Deloitte in Luxembourg.\r\n\r\nYan is also a member of the following bodies:\r\n\r\nInternational Fiscal Association (Treasurer)\r\nAssociation of Trust and Management Companies (Executive member)\r\nSociety of Trust and Estate Practitioners\r\n\r\nFRANCOISE CHAN, MSc DEA TEP - Executive Director\r\n\r\nFrançoise Chan is an Executive Director of Intercontinental Trust Ltd.\r\n\r\nShe holds a "Diplome d\'Etudes Approfondies" (D.E.A.) in Banking and Finance and a "Maitrise" in Econometrics from the University of Paris 1 Sorbonne, France. She also holds a "Magistere d\'Economie" delivered by the same university in conjunction with L\'Ecole Normale Superieure (Ulm) et L\'E.H.E.S.S. (L\'Ecole des Hautes Etudes en Sciences Sociales) of Paris France.\r\n\r\nFrançoise has been in the Global Business Sector since 1994 and acquired extensive experience working in a leading Management Company as well as in the Global Business Division of an International Bank.\r\n\r\nFrançoise is a member of the following bodies:\r\n\r\nSociety of Trust and Estate Practitioners;\r\nInternational Fiscal Association\r\n\r\nTEDDY LO, ACA - Finance Director\r\n\r\nTeddy Lo currently occupies the position of Finance Director and was previously Manager in the Fund Administration department of Intercontinental Trust Ltd. He is a member of the Institute of Chartered Accountants in England & Wales and the Canadian Institute of Chartered Accountants. He holds a Mauritius Stockbrokers Examination Certificate.\r\n\r\nHe worked for six years in a firm of Chartered Accountants in London where his areas of responsibilities were auditing, accounting and taxation. He also worked for Deloitte in Mauritius where he was involved in the listing of a major local bank on the Mauritius Stock Exchange. He spent the last eleven years in Canada and gathered valuable experience in the field of accounting and finance in North America.\r\n\r\nTeddy has attended various conferences in the field of International finance and taxation and is currently pursuing the Chartered Business Valuators designation.', 1),
	(34, '2011-05-26 01:26:45', 'A', 'Mauritius History', '<h1>History</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\nDiscovered by the Dutch and the French in the 16th and 18th century\nrespectively, Mauritius became British at the beginning of the 19th century and\nremained under British rule until its independence in 1968. In 1992, Mauritius\nchanged its status from a Constitutional Monarchy to that of a Republic but\nchose to remain in the British Commonwealth.\n<br/><br/>\nSituated in the Indian Ocean, approximately 2000 kms to the east\nof Durban (South Africa), the island covers a total area of 1860\nkm2 or 720 square miles. Mauritius is situated mid-way between\nEurope and the Far East, being four hours ahead of GMT and four\nhours behind the Far East. Mauritius has a population of 1.2\nmillion and Mauritians are bilingual, being equally fluent in\nEnglish, the official language, and French.\n</p>', 'Discovered by the Dutch and the French in the 16th and 18th century respectively, Mauritius became British at the beginning of the 19th century and remained under British rule until its independence in 1968. In 1992, Mauritius changed its status from a Constitutional Monarchy to that of a Republic but chose to remain in the British Commonwealth.\r\n\r\nSituated in the Indian Ocean, approximately 2000 kms to the east of Durban (South Africa), the island covers a total area of 1860 km2 or 720 square miles. Mauritius is situated mid-way between Europe and the Far East, being four hours ahead of GMT and four hours behind the Far East. Mauritius has a population of 1.2 million and Mauritians are bilingual, being equally fluent in English, the official language, and French. ', 1),
	(39, '2011-05-26 01:26:45', 'A', 'Mauritius Economy', '<h1>Economy</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\nOver the past two decades, the Mauritian economy has diversified\naway from the production of sugar into manufacturing with the\ncreation of the Export Processing Zone (EPZ). The tourism\nindustry also contributes substantial revenue and is currently\nranked third after sugar and manufacturing.\n<br/><br/>\nIn the early nineties, Government introduced the financial\nservices sector as the fourth pillar of the economy with the\nlaunching of the offshore and freeport sectors. The Mauritius\nStock Exchange was launched in 1989 to cater for local needs.\nWith the suspension of all exchange controls in 1994, foreign\ninvestors can now invest freely on the stock exchange.\n<br/><br/>\nThe objective of Mauritius in becoming a regional financial services centre soon\nmaterialised with the increase in the number of double taxation treaties.\nMauritius also succeeded in attracting major multinationals in setting up their\nholding companies in the offshore sector. International Financial Reporting\nStandards are being used and most international accounting firms are present on\nthe island. Mauritius currently has a literacy rate exceeding 95% and this\ncontributes to the high standards of professionalism.\n<br/><br/>\nMauritius is actively involved in regional cooperation.\nMauritius is a member of the South African Development Countries\n("SADC"), the Common Market for Eastern and Southern Africa\n("COMESA") and the Indian Ocean Rim - Association Regional\nCooperation ("IOR- ARC") and is a signatory to all major African\nconventions. With its membership in these regional organisation\nand having tax treaties with 12 African countries, Mauritius\nprovides a unique platform for investments into Africa.\n</p>', 'Over the past two decades, the Mauritian economy has diversified away from the production of sugar into manufacturing with the creation of the Export Processing Zone (EPZ). The tourism industry also contributes substantial revenue and is currently ranked third after sugar and manufacturing.\r\n\r\nIn the early nineties, Government introduced the financial services sector as the fourth pillar of the economy with the launching of the offshore and freeport sectors. The Mauritius Stock Exchange was launched in 1989 to cater for local needs. With the suspension of all exchange controls in 1994, foreign investors can now invest freely on the stock exchange.\r\n\r\nThe objective of Mauritius in becoming a regional financial services centre soon materialised with the increase in the number of double taxation treaties. Mauritius also succeeded in attracting major multinationals in setting up their holding companies in the offshore sector. International Financial Reporting Standards are being used and most international accounting firms are present on the island. Mauritius currently has a literacy rate exceeding 95% and this contributes to the high standards of professionalism.\r\n\r\nMauritius is actively involved in regional cooperation. Mauritius is a member of the South African Development Countries ("SADC"), the Common Market for Eastern and Southern Africa ("COMESA") and the Indian Ocean Rim - Association Regional Cooperation ("IOR- ARC") and is a signatory to all major African conventions. With its membership in these regional organisation and having tax treaties with 12 African countries, Mauritius provides a unique platform for investments into Africa. ', 1),
	(40, '2011-05-26 01:26:45', 'A', 'Mauritius Legal System', '<h1>Legal System</h1>\n<p>\nThe Mauritian legal system is largely based on English and\nFrench law. Criminal and civil litigation is mainly English, as\nis company law, while substantive law is modeled on the French\nNapoleonic Code. Mauritius has chosen to maintain the Judicial\nCommittee of the Privy Council in England as its highest court\nof appeal.\n</p>', 'The Mauritian legal system is largely based on English and French law. Criminal and civil litigation is mainly English, as is company law, while substantive law is modeled on the French Napoleonic Code. Mauritius has chosen to maintain the Judicial Committee of the Privy Council in England as its highest court of appeal. ', 1),
	(41, '2011-05-26 01:26:45', 'A', 'Mauritius International Recognition', '<h1>International Recognition</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\n<ul>\n<li>\nIn the World Bank\'s "Doing Business Survey 2011" report;\nMauritius ranks first as the country with the most\nfavourable business reputation in the African region and\nscores 20th place in the Ease of Doing Business Index out of\n183 countries surveyed.\n</li><li>\nIn Global Competitiveness Index 2010-2011 of the World\nEconomic Forum, Mauritius is ranked 55th in a list of 139\nnations.\n</li><li>\nIn the Global Corruption Perceptions Index 2010, Mauritius\nis ranked 39th out of 178 countries.\n</li><li>\nThe Heritage Foundation and Wall Street Journal rank\nMauritius 12th over a total of 179 countries in their World\nIndex of Economic Freedom 2010.\n</li><li>\nIn the International Property Rights Index 2010, Mauritius\nranks 46th out of 125 countries.\n</li>\n<br/><br/>\nMauritius is also in the white list of the OECD "white list" of\njurisdictions that have substantially implemented\ninternationally agreed tax standards.\n<br/><br/>\n</p>', 'In the World Bank\'s "Doing Business Survey 2011" report; Mauritius ranks first as the country with the most favourable business reputation in the African region and scores 20th place in the Ease of Doing Business Index out of 183 countries surveyed.\r\nIn Global Competitiveness Index 2010-2011 of the World Economic Forum, Mauritius is ranked 55th in a list of 139 nations.\r\nIn the Global Corruption Perceptions Index 2010, Mauritius is ranked 39th out of 178 countries.\r\nThe Heritage Foundation and Wall Street Journal rank Mauritius 12th over a total of 179 countries in their World Index of Economic Freedom 2010.\r\nIn the International Property Rights Index 2010, Mauritius ranks 46th out of 125 countries.\r\n\r\nMauritius is also in the white list of the OECD "white list" of jurisdictions that have substantially implemented internationally agreed tax standards. ', 1),
	(35, '2011-05-26 01:39:20', 'A', 'Global Business Companies', '<h1>Global Business Companies ("GBCs")</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\nThe Mauritius international financial services sector offers two types of\ncompanies namely the Category 1 Global Business Company ("GBC1") and the\nCategory 2 Global Business Company ("GBC2").\n<br/><br/>\nBoth entities offer the highest degree of confidentiality and the choice between\nthe two types will depend on a number of factors namely the proposed activities\nof the company and the geographical area of operation. While the GBC1 is\nresident for tax purposes in Mauritius and can thus avail of the benefits of the\ndouble taxation treaties signed by Mauritius, the GBC2 is tax exempt and is\ntypically used where no tax treaty benefits are sought.\n<br/><br/>\nOur firm can assist in the formation and administration of both\ncategories of companies. We also provide assistance for a\ncompany incorporated in another jurisdiction to apply to the\nRegistrar of Companies to be registered by way of continuation\neither as a GBC1 or GBC2 in Mauritius.\n<br/><br/>\n</p>', 'The Mauritius international financial services sector offers two types of companies namely the Category 1 Global Business Company ("GBC1") and the Category 2 Global Business Company ("GBC2").\r\n\r\nBoth entities offer the highest degree of confidentiality and the choice between the two types will depend on a number of factors namely the proposed activities of the company and the geographical area of operation. While the GBC1 is resident for tax purposes in Mauritius and can thus avail of the benefits of the double taxation treaties signed by Mauritius, the GBC2 is tax exempt and is typically used where no tax treaty benefits are sought.\r\n\r\nOur firm can assist in the formation and administration of both categories of companies. We also provide assistance for a company incorporated in another jurisdiction to apply to the Registrar of Companies to be registered by way of continuation either as a GBC1 or GBC2 in Mauritius. ', 1),
	(42, '2011-05-26 01:39:20', 'A', 'Offshore Trusts', '<h1>Offshore Trusts</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\nMauritius offshore trusts are legal structures used for asset protection,\ninheritance planning and wealth management purposes. Essentially, property or\nassets, whether tangible or intangible, are transferred by the settlor of the\ntrust to the trustees, in accordance with terms set out in a trust deed, for the\ntrustees to hold and administer for and on behalf of specified beneficiaries or\nfor specific purposes.\n<br/><br/>\nMauritius trust law allows for the formation of life interest trusts,\ndiscretionary trusts, fixed interest trusts, purpose trusts, charitable trusts,\nprotective trusts, asset protection trusts etc.\n<br/><br/>\nOur firm specializes in the set up and administration of offshore trusts.\n</p>', 'Mauritius offshore trusts are legal structures used for asset protection, inheritance planning and wealth management purposes. Essentially, property or assets, whether tangible or intangible, are transferred by the settlor of the trust to the trustees, in accordance with terms set out in a trust deed, for the trustees to hold and administer for and on behalf of specified beneficiaries or for specific purposes.\r\n\r\nMauritius trust law allows for the formation of life interest trusts, discretionary trusts, fixed interest trusts, purpose trusts, charitable trusts, protective trusts, asset protection trusts etc.\r\n\r\nOur firm specializes in the set up and administration of offshore trusts. ', 1),
	(43, '2011-05-26 01:39:20', 'A', 'Fund Administration', '<h1>Fund Administration</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\nIntercontinental Trust Ltd provides quality fund administration and accounting\nservices to offshore funds. Our team is geared to respond in timely fashion to\nyour requests and provide you with advice upon your queries. As a management\ncompany, we are responsible for the administration of your offshore fund and we\nprovide the link between the clients and the local regulators.\n<br/><br/>\nAs an administrator, we undertake all relevant statutory filings\nwith the local regulatory bodies. We also offer services for\nappointment of local bankers and foreign custodians. Our\naccounting department undertakes the preparation of accounts,\naccount reporting and audit liaison.\n<br/><br/>\nOur services include:\n<br/><br/>\n<ul>\n<li>\nOffshore fund set-up and administration\n</li><li>\nAdministration services for funds domiciled outside Mauritius\n</li><li>\nAccounting services\n</li><li>\nTax advisory services\n</li><li>\nNet Asset Value calculation\n</li>\n</ul>\n</p>', 'Intercontinental Trust Ltd provides quality fund administration and accounting services to offshore funds. Our team is geared to respond in timely fashion to your requests and provide you with advice upon your queries. As a management company, we are responsible for the administration of your offshore fund and we provide the link between the clients and the local regulators.\r\n\r\nAs an administrator, we undertake all relevant statutory filings with the local regulatory bodies. We also offer services for appointment of local bankers and foreign custodians. Our accounting department undertakes the preparation of accounts, account reporting and audit liaison.\r\n\r\nOur services include:\r\n\r\nOffshore fund set-up and administration\r\nAdministration services for funds domiciled outside Mauritius\r\nAccounting services\r\nTax advisory services\r\nNet Asset Value calculation\r\n', 1),
	(44, '2011-05-26 01:39:20', 'A', 'Other Areas of Expertise', '<h1>Other Areas of Expertise</h1>\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\n<p>\nOther Services but not limited to, include:\n<br/><br/>\n<ul>\n<li>\nProvision of various accounting and Business Process Outsourcing solutions for both local and offshore companies.\n</li><li>\nInternational tax planning advice and monitoring of tax compliance.\n</li><li>\nAssistance in the acquisition of immoveable property under the Integrated Resort Scheme ("IRS") and Real Estate Scheme ("RES")\n</li><li>\nAssistance in the application for occupational permits and permanent resident permits\n</li><li>\nExpatriate tax services, including application for work and residence permits.\n</li><li>\nCaptive insurance set up and administration.\n</li>\n</ul>\n<br/><br/>\n<i>For any other information, please email us.</i>\n<br/><br/>\n</p>', 'Other Services but not limited to, include:\r\n\r\nProvision of various accounting and Business Process Outsourcing solutions for both local and offshore companies.\r\nInternational tax planning advice and monitoring of tax compliance.\r\nAssistance in the acquisition of immoveable property under the Integrated Resort Scheme ("IRS") and Real Estate Scheme ("RES")\r\nAssistance in the application for occupational permits and permanent resident permits\r\nExpatriate tax services, including application for work and residence permits.\r\nCaptive insurance set up and administration.\r\n\r\nFor any other information, please email us. ', 1),
	(36, '2011-05-26 01:44:32', 'A', 'Double Taxation Treaties', '<h1>Double Taxation Treaties</h1>\n<p>\nSo far Mauritius has concluded 36 tax treaties that are in force\nand is party to a series of treaties under negotiation. Most of\nthe treaties in force have been in existence as from the period\nwhen Mauritius launched its offshore sector in 1992.\n<br/><br/>\n<i>Please click here for the list of treaties.</i>\n</p>', 'So far Mauritius has concluded 36 tax treaties that are in force and is party to a series of treaties under negotiation. Most of the treaties in force have been in existence as from the period when Mauritius launched its offshore sector in 1992.\r\n\r\nPlease click here for the list of treaties.', 1),
	(45, '2011-05-26 01:44:32', 'A', 'IPPAs', '<h1>Investment Promotion and Protection Agreements</h1>\n<p>\nMauritius has signed Investment Promotion and Protection Agreements ("IPPAs")\nwith a number of countries. The IPPAs encourage and also protect investments by\nvirtue of measure to minimize any deprivation of investments. In the worst case\nscenario, any deprivation of investments will have to be justly compensated.\nThis provides additional comfort to investors since this can significantly\nreduce investment risks where there may exist some risk of nationalization or\nexpropriation. Furthermore, the IPPAs also provide free repatriation of\ninvestment capital and returns.\n<br/><br/>\n<i>Please click here for the list of IPPAs.</i>\n<br/><br/>\n</p>', 'Mauritius has signed Investment Promotion and Protection Agreements ("IPPAs") with a number of countries. The IPPAs encourage and also protect investments by virtue of measure to minimize any deprivation of investments. In the worst case scenario, any deprivation of investments will have to be justly compensated. This provides additional comfort to investors since this can significantly reduce investment risks where there may exist some risk of nationalization or expropriation. Furthermore, the IPPAs also provide free repatriation of investment capital and returns.\r\n\r\nPlease click here for the list of IPPAs. ', 1),
	(46, '2011-05-27 12:10:15', 'A', 'Default Article', '<h1>No Content Found</h1>', 'No Content Found', 1),
	(38, '2011-05-31 16:41:26', 'A', 'Why ITL', '<h2>Why ITL</h2>\r\n<img src="images/about_us_pix.jpg" alt=""class="flt_lft" />\r\n<p>\r\n<ul class="core_list">\r\n<li>One of the leading Management Companies in Mauritius</li>\r\n<li>Principals involved in the Global Business sector in Mauritius since its inception.</li>\r\n<li>Large institutional clients and high profile organizations in portfolio</li>\r\n<li>Successfully completed a SAS70 Type II audit by Pricewaterhouse Coopers</li>\r\n<li>First Management Company in Mauritius to be accredited\r\nas an Authorized Training Employer by the Institute of\r\nChartered Accountants in England and Wales</li>\r\n<li>High quality service based on Continuity, Stability and Consistency</li>\r\n<li>Low staff turnover</li>\r\n</ul>\r\n</p>', 'One of the leading Management Companies in Mauritius. \r\nPrincipals involved in the Global Business sector in Mauritius since its inception.\r\nLarge institutional clients and high profile organizations in portfolio.\r\nSuccessfully completed a SAS70 Type II audit by Pricewaterhouse Coopers.\r\nFirst Management Company in Mauritius to be accredited as an Authorized Training Employer by the Institute of Chartered Accountants in England and Wales.\r\nHigh quality service based on Continuity, Stability and Consistency.\r\nLow staff turnover.\r\n', 1),
	(47, '2011/06/06 10:42:52', 'N', 'Latest News', '<h3 id="whathaveyoudoneformelately">What have you done for me lately?</h3>\r\n<p><em>Version control</em>, also known as source control or revision control is an integral part of any development workflow. Why? It is essentially a communication tool, just like email or IM, but it works with code rather than human conversation.</p>\r\n<p>Version control</p>\r\n<ul>\r\n	<li>allows programmers to easily communicate their work to other programmers</li>\r\n	<li>allows a team to share code</li>\r\n	<li>maintains separate &ldquo;production&rdquo; versions of code that are always deployable</li>\r\n	<li>allows simultaneous development of different features on the same codebase</li>\r\n	<li>keeps track of all old versions of files</li>\r\n	<li>prevents work being overwritten</li>\r\n</ul>\r\n<h3 id="whatisversioncontrol">What is version control?</h3>\r\n<p>Version control, alternately known as revision control or source code management, is a system that maintains versions of files at progressive stages of development. The version control system is similar in theory to backing up your files, but smarter. Every file in the system has a full history of changes, and can easily be restored to any version in its history. Each version has a unique identifier that looks like a string of letters and numbers (443e63e6..).</p>\r\n<p>There are many different programs for version control. This document is based on <em>git</em>, but you may be aware of Subversion (svn), CVS, darcs, Mercurial or others. Each has a slightly different metaphor for operation.</p>\r\n', 'What have you done for me lately?\r\nVersion control, also known as source control or revision control is an integral part of any development workflow. Why? It is essentially a communication tool, just like email or IM, but it works with code rather than human conversation.\r\nVersion control\r\n\r\n	allows programmers to easily communicate their work to other programmers\r\n	allows a team to share code\r\n	maintains separate &ldquo;production&rdquo; versions of code that are always deployable\r\n	allows simultaneous development of different features on the same codebase\r\n	keeps track of all old versions of files\r\n	prevents work being overwritten\r\n\r\nWhat is version control?\r\nVersion control, alternately known as revision control or source code management, is a system that maintains versions of files at progressive stages of development. The version control system is similar in theory to backing up your files, but smarter. Every file in the system has a full history of changes, and can easily be restored to any version in its history. Each version has a unique identifier that looks like a string of letters and numbers (443e63e6..).\r\nThere are many different programs for version control. This document is based on git, but you may be aware of Subversion (svn), CVS, darcs, Mercurial or others. Each has a slightly different metaphor for operation.\r\n', 1),
	(51, '2011/06/06 11:07:56', 'E', 'Latest Events', '<h2 id="_description">DESCRIPTION</h2>\r\n<div class="sectionbody">\r\n	<div class="paragraph">\r\n		<p>This tutorial explains how to import a new project into git, make changes to it, and share changes with other developers.</p>\r\n	</div>\r\n	<div class="paragraph">\r\n		<p>If you are instead primarily interested in using git to fetch a project, for example, to test the latest version, you may prefer to start with the first two chapters of <a href="http://www.kernel.org/pub/software/scm/git/docs/user-manual.html">The Git User&rsquo;s Manual</a>.</p>\r\n	</div>\r\n	<div class="paragraph">\r\n		<p>First, note that you can get documentation for a command such as <tt>git log --graph</tt> with:</p>\r\n	</div>\r\n	<div class="listingblock">\r\n		<div class="content">\r\n			<pre><tt>$ man git-log</tt></pre>\r\n		</div>\r\n	</div>\r\n	<div class="paragraph">\r\n		<p>or:</p>\r\n	</div>\r\n	<div class="listingblock">\r\n		<div class="content">\r\n			<pre><tt>$ git help log</tt></pre>\r\n		</div>\r\n	</div>\r\n	<div class="paragraph">\r\n		<p>With the latter, you can use the manual viewer of your choice; see <a href="http://www.kernel.org/pub/software/scm/git/docs/git-help.html">git-help(1)</a> for more information.</p>\r\n	</div>\r\n	<div class="paragraph">\r\n		<p>It is a good idea to introduce yourself to git with your name and public email address before doing any operation. The easiest way to do so is:</p>\r\n	</div>\r\n	<div class="listingblock">\r\n		<div class="content">\r\n			<pre><tt>$ git config --global user.name &quot;Your Name Comes Here&quot;\r\n$ git config --global user.email you@yourdomain.example.com</tt></pre>\r\n		</div>\r\n	</div>\r\n</div>\r\n', 'DESCRIPTION\r\n\r\n	\r\n		This tutorial explains how to import a new project into git, make changes to it, and share changes with other developers.\r\n	\r\n	\r\n		If you are instead primarily interested in using git to fetch a project, for example, to test the latest version, you may prefer to start with the first two chapters of The Git User&rsquo;s Manual.\r\n	\r\n	\r\n		First, note that you can get documentation for a command such as git log --graph with:\r\n	\r\n	\r\n		\r\n			$ man git-log\r\n		\r\n	\r\n	\r\n		or:\r\n	\r\n	\r\n		\r\n			$ git help log\r\n		\r\n	\r\n	\r\n		With the latter, you can use the manual viewer of your choice; see git-help(1) for more information.\r\n	\r\n	\r\n		It is a good idea to introduce yourself to git with your name and public email address before doing any operation. The easiest way to do so is:\r\n	\r\n	\r\n		\r\n			$ git config --global user.name &quot;Your Name Comes Here&quot;\r\n$ git config --global user.email you@yourdomain.example.com\r\n		\r\n	\r\n\r\n', 1);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;


# Dumping structure for table itl.contact
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `tel` int(10) unsigned DEFAULT NULL,
  `mobile` int(10) unsigned DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` int(10) unsigned DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table itl.contact: 0 rows
DELETE FROM `contact`;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


# Dumping structure for table itl.content
DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` int(10) unsigned DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table itl.content: 0 rows
DELETE FROM `content`;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
/*!40000 ALTER TABLE `content` ENABLE KEYS */;


# Dumping structure for table itl.document
DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `datevalidfrom` date DEFAULT NULL,
  `datevalidto` date DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table itl.document: 1 rows
DELETE FROM `document`;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`id`, `user_id`, `type`, `path`, `title`, `description`, `date`, `datevalidfrom`, `datevalidto`, `createdby`) VALUES
	(6, 6, NULL, 'documents/andres/planilandia.pdf', 'Test Document', 'Test Document', '2011-06-09 12:28:38', '2011-06-09', '2011-06-29', 'Vick Navjee');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;


# Dumping structure for table itl.holidays
DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `holiday_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

# Dumping data for table itl.holidays: 16 rows
DELETE FROM `holidays`;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` (`id`, `title`, `holiday_date`) VALUES
	(1, 'New Year', '2011-01-01'),
	(2, 'Cavadee', '2011-01-20'),
	(3, 'Abolition of Slavery', '2011-02-01'),
	(4, 'Chinese Spring Festival', '2011-02-03'),
	(5, 'Maha Shivaratree', '2011-03-02'),
	(6, 'National Day', '2011-03-12'),
	(7, 'Ugadi', '2011-04-04'),
	(8, 'Labour Day', '2011-05-01'),
	(9, 'Eid', '2011-08-31'),
	(10, 'Ganesh Chaturthi', '2011-09-02'),
	(11, 'Diwali', '2011-10-26'),
	(12, 'All Saints Day', '2011-11-01'),
	(13, 'Indentured Labourer', '2011-11-02'),
	(14, 'Christmas', '2011-12-25'),
	(15, 'New Year', '2011-01-02'),
	(16, 'New Year', '2011-01-03');
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;


# Dumping structure for table itl.log
DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_user_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `document_user_id` (`document_user_id`),
  KEY `document_id` (`document_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

# Dumping data for table itl.log: 14 rows
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id`, `document_user_id`, `document_id`, `date`, `status`) VALUES
	(1, 2, 1, '2011-01-24 12:43:04', 'document added'),
	(2, 2, 1, '2011-01-24 12:43:13', 'document viewed'),
	(3, 6, 2, '2011-06-08 16:38:24', 'document added'),
	(4, 6, 3, '2011-06-08 17:31:33', 'document added'),
	(5, 6, 4, '2011-06-08 17:35:03', 'document added'),
	(6, 6, 3, '2011-06-08 17:51:20', 'document viewed'),
	(7, 6, 3, '2011-06-08 17:51:46', 'document viewed'),
	(8, 6, 3, '2011-06-08 17:52:17', 'document viewed'),
	(9, 6, 5, '2011-06-09 12:26:09', 'document added'),
	(10, 6, 5, '2011-06-09 12:26:14', 'document viewed'),
	(11, 6, 6, '2011-06-09 12:28:38', 'document added'),
	(12, 6, 6, '2011-06-09 12:28:43', 'document viewed'),
	(13, 6, 6, '2011-06-09 12:29:28', 'document viewed'),
	(14, 6, 6, '2011-06-09 12:30:11', 'document viewed');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;


# Dumping structure for table itl.top_menu
DROP TABLE IF EXISTS `top_menu`;
CREATE TABLE IF NOT EXISTS `top_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `link_id` int(10) DEFAULT NULL,
  `link_url` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

# Dumping data for table itl.top_menu: 21 rows
DELETE FROM `top_menu`;
/*!40000 ALTER TABLE `top_menu` DISABLE KEYS */;
INSERT INTO `top_menu` (`id`, `name`, `parent_id`, `link_id`, `link_url`) VALUES
	(1, 'About Us', NULL, NULL, '#'),
	(2, 'Our Profile', 1, 1, ''),
	(3, 'Why ITL', 1, 38, ''),
	(4, 'Our Directors', 1, 33, ''),
	(5, 'About Mauritius', NULL, NULL, '#'),
	(6, 'History', 5, 34, ''),
	(7, 'Economy', 5, 39, ''),
	(8, 'Legal System', 5, 40, ''),
	(9, 'International Recognition', 5, 41, ''),
	(10, 'Our Expertise', NULL, NULL, '#'),
	(11, 'GBC 1 & 2', 10, 35, ''),
	(12, 'Trust', 10, 42, ''),
	(13, 'Fund', 10, 43, ''),
	(14, 'Others', 10, 44, ''),
	(15, 'Resources', NULL, NULL, '#'),
	(16, 'Newsletter', 15, NULL, '#'),
	(0, 'Home', NULL, NULL, 'index.php'),
	(18, 'Double Taxation Treaties', 15, 36, ''),
	(19, 'IPPAs', 15, 45, ''),
	(20, 'Updates', 15, NULL, '#'),
	(22, 'Contact Us', NULL, NULL, '#');
/*!40000 ALTER TABLE `top_menu` ENABLE KEYS */;


# Dumping structure for table itl.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) DEFAULT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table itl.user: 3 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `surname`, `other_name`, `company`, `type`, `login`, `password`, `email`, `status`) VALUES
	(1, 'Admin', 'IFS Mauritius', 'T10', 1, 'superadmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'andres@technology10.com', 1),
	(2, 'Navjee', 'Vick', 'T10', 2, 'tech10', '258c7a08e5979ec10749eb82c7e5b01b', 'vick@technology10.com', 1),
	(6, 'Gonzalez', 'Andres', 'T10', 2, 'andres', '258c7a08e5979ec10749eb82c7e5b01b', 'andres@technology10.com', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


# Dumping structure for table itl.user_type
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table itl.user_type: 3 rows
DELETE FROM `user_type`;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` (`id`, `name`) VALUES
	(1, 'SuperAdmin'),
	(2, 'Customer'),
	(3, 'Subscriber');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
