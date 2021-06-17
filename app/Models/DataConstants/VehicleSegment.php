<?php

namespace App\Models\DataConstants;

abstract class VehicleSegment {
    const A = 'A';
    const B = 'B';
    const C = 'C';
    const D = 'D';
    const E = 'E';
    const F = 'F';

    public static function getSelectOptions() {
        return [
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E',
            'F' => 'F',
        ];
    }

    public static function getKeyToDescriptionMap() {
        return [
            'A' => 'Małe samochody przeznaczone do jazdy miejskiej',
            'B' => 'Małe samochody oferujące więcej aniżeli segment A - miejsca dla pasażerów oraz praktyczny bagażnik. Nadają się również na mniejsze trasy',
            'C' => 'Samochody średnich wymiarów przeznaczone do jazdy po mieście oraz na trasach',
            'D' => 'Samochody zapewniające komfortowe warunki podróżowania pięciu dorosłym osobom (z bagażem) na dłuższych dystansach. Najczęściej w wersjach nadwoziowych sedan oraz kombi',
            'E' => 'Duże, komfortowe i bogato wyposażone samochody, których celem jest nie tylko użytkowanie przez rodziny, ale także jako reprezentacyjne limuzyny dla firm',
            'F' => 'Limuzyny o najwyższym poziomie wyposażenia i najlepszych (często największych) silnikach. Ich cechy pozwalają na bardzo komfortową podróż zarówno kierowcy, jak i pasażerom. Używane często jako reprezentacyjne limuzyny dla szefów państw, firm itd',
        ];
    }
}
