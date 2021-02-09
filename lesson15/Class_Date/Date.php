<?php

// сделаем класс для работы с датой. Пусть этот класс параметром конструктора принимает дату в формате 'год-месяц-день' 

use SebastianBergmann\CodeCoverage\Report\PHP;

class Date
{
    private DateTime $date;

    public function __construct($date = null)
    {
        // если дата не передана - пусть берется текущая
        if (is_null($date)) {
            $this->date = new DateTime('now');
        } else {
            $this->date = new DateTime($date);
        }
    }

    public function getDay(): string
    {
        // возвращает день
        return $this->date->format('d');
    }

    public function getMonth($lang = null): string
    {
        // возвращает месяц

        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке

        $arrayMonth = [
            'январь' => 'January',
            'февраль' => 'February',
            'март' => 'March',
            'апрель' => 'April',
            'май' => 'May',
            'июнь' => 'June',
            'июль' => 'July',
            'август' => 'August',
            'сентябрь' => 'September',
            'октябрь' => 'October',
            'ноябрь' => 'November',
            'декабрь' => 'December',
        ];

        switch ($lang) {
            case null:
                return $this->date->format('M');
                break;

            case 'en':
                return $this->date->format('F');
                break;

            case 'ru':
                $strMonth = $this->date->format('F');

                return StringEditor::my_mb_ucfirst(array_search($strMonth, $arrayMonth));
                break;
        }
    }

    public function getYear()
    {
        // возвращает год
        return $this->date->format('Y');
    }

    public function getWeekDay($lang = null)
    {
        // возвращает день недели

        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке

        $weekDay = [
            '1' => 'понедельник',
            '2' => 'вторник',
            '3' => 'cреда',
            '4' => 'четверг',
            '5' => 'пятница',
            '6' => 'суббота',
            '7' => 'воскресенье'
        ];

        switch ($lang) {
            case null:
                return $this->date->format('S');
                break;

            case 'en':
                return $this->date->format('l');
                break;

            case 'ru':
                $day = '';
                foreach ($weekDay as $key => $value) {
                    if ($key == $this->date->format('N')) {
                        $day = $value;
                    }
                }
                return StringEditor::my_mb_ucfirst($day);
                break;
        }
    }

    public function addDay($value)
    {
        // добавляет значение $value к дню
        if ($value > 0) {
            $this->date->add(new DateInterval('P'.$value.'D'));
        }
    }   

    public function subDay($value)
    {
        // отнимает значение $value от дня
        if ($value > 0) {
            $this->date->sub(new DateInterval('P'.$value.'D'));
        }
    }

    public function addMonth($value)
    {
        // добавляет значение $value к месяцу
        $this->date->modify('+'.$value.'month');
    }

    public function subMonth($value)
    {
        // отнимает значение $value от месяца
        $this->date->modify('-'.$value.'month');
    }

    public function addYear($value)
    {
        // добавляет значение $value к году
        $this->date->modify('+'.$value.'year');
    }

    public function subYear($value)
    {
        // отнимает значение $value от года
        $this->date->modify('-'.$value.'year');
    }

    public function format($format)
    {
        // выведет дату в указанном формате
        // формат пусть будет такой же, как в функции date

        return $this->date->format($format);
    }

    public function __toString()
    {
        // выведет дату в формате 'год-месяц-день'
        return $this->date->format('Y-M-d');
    }
}

class StringEditor
{
    public static function my_mb_ucfirst(string $str): string
    {
        $e = 'utf-8';
        $fc = mb_strtoupper(mb_substr($str, 0, 1, $e), $e);
        return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
    }
}

