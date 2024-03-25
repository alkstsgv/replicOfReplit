<?php declare(strict_types=1);

const
  T_PIPE = 0,
  T_CMD = 1,
  T_OPTION = 2,
  T_OPTION_VALUE = 3,
  T_ARG = 4
;

class Word {
  public function __construct(
    public int $token,
    public int $index,
  ) {}

  // public int $token;
  // public int $index;

  // public function __construct(int $token, int $index) {
  //   $this->token = $token;
  //   $this->index = $index;
  // }
}

 /**
  * cat myfile.txt | grep -E "^$"
  * @return Word[] 
  */
function parse(string $code): array {
  $w = new Word("cmd", 1);
}


