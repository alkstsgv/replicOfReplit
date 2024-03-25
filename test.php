<?php

declare(strict_types = 1);


/**
$x = 5 //int;
$x = "2342342342dfsdfgsdfg";//string
$x = [1, 2, 3];
$x = [1, "1"];
$x = [1, 1];

foreach ($x as $n) {
echo $n;
}

$y = [
"name" => "John",
"age" => 21,
];
foreach ($y as $k => $v) {
echo $k . " " . $v;
}
$arr = [
[1, 2],
[3, 4],
];
foreach ($arr as [$a, $b]) {
echo $a + $b;
}




Знак
/      \
Смысл------Значение

"Пушкин"
"Человек, который написал роман в стихах 'Евгений Онегин'"

$x = 1;
$y = &$x;


function foo(int $x): int
{
return $x + 1;
}
foo(1);
$foo = function (int $x): int {
return $x + 1;
};
$foo(1);
$bar = fn(int $x) => $x + 1;
$bar(1);






 */

function trimSpaces(string $str): string
{
  if ($str === "") {
    return "";
  }
  $slice = [];
  for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] !== " ") {
      $slice[] = $i;
        break;
    }
  }
  for ($i = strlen($str) - 1; $i >= 0; $i--) {
    if ($str[$i] !== " ") {
        $slice[] = $i;
        break;
    }
  }
  if ($slice === []) {
    return "";
  }
  $r = "";
  for ($i = 0; $i < strlen($str); $i++) {
    if ($i >= $slice[0] && $i <= $slice[1]) {
        $r .= $str[$i];
    }
  }

  return $r;
}

// checkCases(trimSpaces(...), [
//            ["", ""],
//            [" ", ""],
//            ["    ", ""],
//            ["  werwer", "werwer"],
//            ["qwerw   ", "qwerw"],
//            ["   werwer  ", "werwer"],
//            ["   werwer werwer   ", "werwer werwer"],
// ]);

function splitBySpace(string $str): array
{
  //$str = trimSpaces($str);
  $arr = [];
  $word = "";
  for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] !== " ") {
        $word .= $str[$i];
    }
    if ($str[$i] === " " || $i === strlen($str) - 1) {
      if ($word !== "") {
        $arr[] = $word;
      }  
      $word = "";
    }
  }

  return $arr;
}

/* checkCases(splitBySpace(...), [
            ["", []],
            [" ", []],
            ["  ", []],
            ["   ", []],
            [" qweqwe qweqwe", ["qweqwe", "qweqwe"]],
            ["qwer    qwer", ["qwer", "qwer"]],
            ["qer", ["qer"]],
            ["q w e r", ["q", "w", "e", "r"]],
 ]);*/
/**
1. только один разделитель
2. разделитель стоит между двумя аргументами

grep 0< myfile.txt

cat myfile.txt | grep -E "^$"
cat myfile.txt
grep -E "^$"

cat myfile.txt | grep -E "^$"

const
  T_PIPE = 0,
  T_CMD_NAME = 1
;


cat 0< grep
[[T_CMD, "cat"], [T_PIPE, "0<"], [T_CMD, "grep"]]
cat 0< -e - "102"

cat myfile.txt | grep -E="^$"

[[T_CMD, "cat myfile.txt"], [T_PIPE, "|"], [T_CMD, "grep -E "^$""]] 

[
  [T_CMD, "cat"],
  [T_ARG, "myfile.txt"],
  [T_PIPE, "|"],
  [T_CMD, "grep -E \"^$\""],
  [T_OPTION, "-E"],
  [T_OPTION_VALUE, '"^$"']
] 
if (true) {
  return array_filter([1, 2, 3], function () {});
}
5|1|2|9|10|15|8|11
if () {...}
5|1|2|.*|10|{регулярное выражение для return}{рег выражение для знач ретурн}|11

PipeRule:
1. Команда - req
2. Знак пайпа - req
3. Команда - req

CommandRule:
1. CommandName - req
2. args... - optional
3. options... - optional

Option Rule:
1. Option name -req
2. Option value - optional

I love my mother.
Подлежащее[i] сказуемое[love] местоимение[my] дополнение[mother]
[[подлежащее, "i"]...]

rule ПРЕДЛОЖЕНИЙ: 
1. подлежащее - require
2. сказуемое - require
3... допольнение, прилагательное, наречие, местоимение - optional
{
  "name": "pipe",
  "childs": [
    {
      "name": "cmd",
      "path": "/usr/bin/cat"
      "options": [],
      "args": ["myfile.txt"]
    },
    {
      "name": "cmd",
      "path": "/usr/bin/grep",
      "options": [
        {
          "name": "-E",
          "value": "^$"
        }
      ],
      "args": []
    }
  ]
}

for file in $(find .) do
  echo $file
done

cat grep... -> cmd
1. парсинг и токинезация
2. проверка грамматики
3. трансляция
if ($f = func(func2(func() => {}))) {

}
      T_ARROW
    /        \
  T_OP        T_OP
*/
$rules = [
  [T_OP, T_ARROW, T_OP],
];

$hanlders = [
  fn(array $tokens) => realyCoolHandler($tokens),
];

foreach ($rules as $rule) {
  if ($r = findRule($rule, $words) {
    break;
  }
}

function testRule(array $rule, array $words): null|object {
  foreach ($rule as $index => $token) {
    if (!isset($word[$index]) && $words[$index]->name !== $token) {
      return rule;
    }
  }
  return null;
}


function is_valid(array $words, string $descriptor = "0<"): bool
{
  return count($words) === 3 && $words[1] === $descriptor; 

  $index = 0;

  foreach ($words as $k => $v) {
    if ($v === $descriptor) {
      if ($k > 0 && $k < count($words) - 1) {
        $index++;
      } else {
        return false;
      }
    }
  }

  return $index === 1;
    // if ($index === 1) {
    //    return true;
    // } elseif($index > 1) {
    //     return false;
    // }
    // return false;
}

function parse(string $input, $descriptor = "0<"): array
{
  $arrWithWords = splitBySpace($input);

  var_dump(is_valid($arrWithWords));
  $valid = is_valid($arrWithWords);
  if ($valid) {
    foreach ($arrWithWords as $k => $v) {
      if ($v === $descriptor) {
        print_r($v);
        unset($arrWithWords[$k]);
        return array_values($arrWithWords);
      }
    }
  }
  return [];
}

function checkCases(callable $func, array $cases): void
{
  foreach ($cases as $index => [$args, $expectedResult]) {
    if (is_array($args)) {
        $r = $func(...$args);
    } else {
      $r = $func($args);
    }
    if ($r !== $expectedResult) {
        var_dump($r);
        $index++;
        throw new \Exception("failed: $index");
    }
    echo "Success\n";
  }
}

function foo(int $x): int {
  return $x + 1;
}

checkCases(foo(...), [
           [1, 2],
]);

function bar(int $a, int $b): int {
  return $a + $b;
}

function her(array $a): int {
  return current($a);
}

checkCases(bar(...), [
           [[1, 2], 3],

]);

//function checkCases(callable $func, array $cases): void
//{
//    $numOfCase = 0;
//    foreach ($cases as $index => [$args, $expectedResult]) {
//        $numOfCase++;
//        $r = $func(...$args);
//        if ($r !== $expectedResult) {
//            echo "Failed! Test $numOfCase\n, expected {$expectedResult} != {$r}";
//            $index++;
//            // throw new \Exception("failed: $index");
//        }
//        echo "Success: Test $numOfCase\n";
//    }
//}




checkCases(fn($n) => parse($n), [
  ["", []],
  ["grep myfile.txt", []],
  ["grep myfile.txt 0<", []],
  ["7", []],
  ["0<", []],
  ["grep 0< myfile.txt", ["grep", "myfile.txt"]],
  ["grep 0< ./home/alex/myfile.txt", ["grep", "./home/alex/myfile.txt"]],
  ["grep 0< 0ome/alex/myfile.txt", ["grep", "0ome/alex/myfile.txt"]],
  ["0< grep 0< 0ome/alex/myfile.txt", []],
  ["grep 0< //.home/alex/myfile.txt 0<", []],
  ["grep 0< 0ome/alex/myfile.txt 0< myfile.txt", []]
]);





checkCases(fn($n) => is_valid($n), [
  [[[""]], false],
  [[["grep myfile.txt"]], false],
  [[["grep myfile.txt 0<"]], false],
  [[["7"]], false],
  [[["0<"]], false],
  [[["grep 0< myfile.txt"]], true],
  [[["grep 0< ./home/alex/myfile.txt"]], true],
  [[["grep 0< 0ome/alex/myfile.txt"]], true],
  [[["0< grep 0< 0ome/alex/myfile.txt"]], false],
  [[["grep 0< //.home/alex/myfile.txt 0<"]], false],
  [[["grep 0< 0ome/alex/myfile.txt 0< myfile.txt"]], false]
]);
//


//$inputString = "grep 0< myfile.txt";
//var_dump(parse($inputString));
//
//$inputArr = ["grep 0< myfile.txt"];
//var_dump(is_valid($inputArr));