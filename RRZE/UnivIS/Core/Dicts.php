<?php

namespace RRZE\UnivIS\Core;

class Dicts
{
    public static $acronyms = [
        "Dr." => "Doktor",
        "Prof." => "Professor",
        "Dipl." => "Diplom",
        "Inf." => "Informatik",
        "Wi." => "Wirtschaftsinformatik",
        "Ma." => "Mathematik",
        "Ing." => "Ingenieurwissenschaft",
        "B.A." => "Bakkalaureus",
        "M.A." => "Magister Artium",
//        "M.Sc." => "Master of Science",
//        //"M. Sc." => "Master of Science",
//        "M.Eng." => "Master of Engineering",
//        //"M. Eng." => "Master of Engineering",
//        "M.Ed." => "Master of Education",
//        //"M. Ed." => "Master of Education",
        "phil." => "Geisteswissenschaft",
        "pol." => "Politikwissenschaft",
        "nat." => "Naturwissenschaft",
        "soc." => "Sozialwissenschaft",
        "techn." => "technische Wissenschaften",
        "vet.med." => "Tiermedizin",
        "med.dent." => "Zahnmedizin",
        "h.c." => "ehrenhalber",
        "med." => "Medizin",
        "jur." => "Recht",
        "rer." => ""
    ];
   
    // Reihenfolge wichtig, da sonst Mehrfachersetzung von z.B. sem
    public static $lecturetypen = [
        "awa" => "Anleitung zu wiss. Arbeiten  (AWA)",
        "ku" => "Kurs  (KU)",
        "ak" => "Aufbaukurs  (AK)",
        "ex" => "Exkursion  (EX)",
        "gk" => "Grundkurs  (GK)",
        "sem" => "Seminar  (SEM)",
        "es" => "Examensseminar  (ES)",
        "ts" => "Theorieseminar  (TS)",
        "ag" => "Arbeitsgemeinschaft  (AG)",
        "mas" => "Masterseminar  (MAS)",
        "gs" => "Grundseminar  (GS)",
        "us" => "Übungsseminar (US)",
        "as" => "Aufbauseminar  (AS)",
        "hs" => "Hauptseminar  (HS)",
        "re" => "Repetitorium  (RE)",
        "kk" => "Klausurenkurs  (KK)",
        "klv" => "Klinische Visite  (KLV)",
        "ko" => "Kolloquium  (KO)",
        "ks" => "Kombiseminar  (KS)",
        "ek" => "Einführungskurs  (EK)",
        "ms" => "Mittelseminar  (MS)",
        "os" => "Oberseminar  (OS)",
        "pr" => "Praktikum  (PR)",
        "prs" => "Praxisseminar  (PRS)",
        "pjs" => "Projektseminar  (PJS)",
        "ps" => "Proseminar  (PS)",
        "sl" => "Sonstige Lehrveranstaltung  (SL)",
        "tut" => "Tutorium  (TUT)",
        "v-ue" => "Vorlesung mit Übung  (V/UE)",
        "ue" => "Übung  (UE)",
        "vorl" => "Vorlesung  (VORL)",
        "hvl" => "Hauptvorlesung  (HVL)",
        "pf" => "Prüfung  (PF)",
        "gsz" => "Gremiensitzung  (GSZ)",
        "ppu" => "Propädeutische Übung (PPU)",
        "his" => "Sprachhistorisches Seminar (HIS)"
    ];
    
    public static $lecturetypen_short = [
        "awa" => "Anleitung zu wiss. Arbeiten",
        "ts" => "Theorieseminar",
        "ag" => "Arbeitsgemeinschaft",
        "ak" => "Aufbaukurs",
        "ex" => "Exkursion",
        "gk" => "Grundkurs",
        "sem" => "Seminar",
        "es" => "Examensseminar",
        "mas" => "Masterseminar",
        "gs" => "Grundseminar",
        "us" => "Übungsseminar",
        "as" => "Aufbauseminar",
        "hs" => "Hauptseminar",
        "re" => "Repetitorium",
        "kk" => "Klausurenkurs",
        "klv" => "Klinische Visite",
        "ko" => "Kolloquium",
        "ks" => "Kombiseminar",
        "ku" => "Kurs",
        "ek" => "Einführungskurs",
        "ms" => "Mittelseminar",
        "os" => "Oberseminar",
        "pr" => "Praktikum",
        "prs" => "Praxisseminar",
        "pjs" => "Projektseminar",
        "ps" => "Proseminar",
        "sl" => "Sonstige Lehrveranstaltung",
        "tut" => "Tutorium",
        "v-ue" => "Vorlesung mit Übung",
        "ue" => "Übung",
        "vorl" => "Vorlesung",
        "hvl" => "Hauptvorlesung",
        "pf" => "Prüfung",
        "gsz" => "Gremiensitzung",
        "ppu" => "Propädeutische Übung",
        "his" => "Sprachhistorisches Seminar"
    ];
    
    public static $leclanguages = [
        "D" => "Deutsch"
    ];
    
    public static $pubtypes = [
        "artmono" => "Artikel im Sammelband",
        "arttagu" => "Artikel im Tagungsband",
        "artzeit" => "Artikel in Zeitschrift",
        "techrep" => "Interner Bericht (Technischer Bericht, Forschungsbericht)",
        "hschri" => "Hochschulschrift (Dissertation, Habilitationsschrift, Diplomarbeit etc.)",
        "dissvg" => "Hochschulschrift (auch im Verlag erschienen)",
        "monogr" => "Monographie",
        "tagband" => "Tagungsband (nicht im Verlag erschienen)",
        "schutzr" => "Schutzrecht"
    ];
    
    public static $hstypes = [
        "diss" => "Dissertation",
        "dipl" => "Diplomarbeit",
        "mag" => "Magisterarbeit",
        "stud" => "Studienarbeit",
        "habil" => "Habilitationsschrift",
        "masth" => "Masterarbeit",
        "bacth" => "Bachelorarbeit",
        "intber" => "Interner Bericht",
        "diskus" => "Diskussionspapier",
        "discus" => "Discussion paper",
        "forber" => "Forschungsbericht",
        "absber" => "Abschlussbericht",
        "patschri" => "Patentschrift",
        "offenleg" => "Offenlegungsschrift",
        "patanmel" => "Patentanmeldung",
        "gebrmust" => "Gebrauchsmuster"
    ];
}
