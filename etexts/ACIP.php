<?php

class TibetanConverter {
    private $STD_TIB_STACKS_PREFIX = [
        "bg", "dm", "dk", "bk", "brk", "bsk", "mkh", "'kh", "dg", "bg", "mg",
        "'g", "brg", "bsg", "dng", "mng", "brng", "bsng", "gc", "bc", "ch",
        "mch", "'ch", "mj", "'j", "brj", "gny", "mny", "brny", "bsny", "gt",
        "bt", "brt", "blt", "bst", "mth", "'th", "gd", "bd", "md", "'d",
        "brd", "bld", "bsd", "gn", "mn", "brn", "bsn", "dp", "ph", "'ph",
        "bl", "db", "'b", "gts", "bts", "brts", "bsts", "tsh", "mtsh",
        "'tsh", "mdz", "'dz", "brdz", "gzh", "bzh", "gz", "bz", "bzl",
        "brl", "gsh", "bsh", "gs", "bs", "bsl"
    ];

    public function ACIPtoEWTS($s) {
        $s = trim($s);
        // Remove comments
        $s = preg_replace('/\[[^\]]*\]/', '', $s);
        $s = preg_replace('/\@[^ ]* */', '', $s);
        // Remove parentheses
        $s = str_replace('(', '', $s);
        $s = str_replace(')', '', $s);
        // Convert /.../ to (...)
        $s = preg_replace('/\/([^\/]*)\//', '($1)', $s);
        $s = str_replace('/', '', $s); // for leftover /

        // Simple substitutions
        $s = str_replace(';', '|', $s);
        $s = str_replace('#', '@##', $s);
        $s = str_replace('*', '@#', $s);
        $s = str_replace('\\', '?', $s);
        $s = str_replace('^', '\\U0F38', $s);
        $s = str_replace(',', '/', $s);
        $s = str_replace('`', '!', $s);
        $s = str_replace('V', 'W', $s);
        $s = str_replace('TS', 'TSH', $s);
        $s = str_replace('TZ', 'TS', $s);

        // Handle special cases
        $s = preg_replace('/([BCDGHJKLMN\'PRSTVYZhdtn])A-/', '$1.', $s);
        $s = str_replace('-', '.', $s);
        $s = preg_replace('/A?i/', '-I', $s);
        $s = preg_replace('/A?\'-I/', '-i', $s);
        $s = str_replace('o', 'x', $s);
        $s = str_replace('%', '~x', $s);

        // Handle vowels after apostrophe
        $s = preg_replace_callback(
            '/([BCDGHJKLMNPRSTVYZ\'hdtn])\'([AEOUI])/',
            function($matches) {
                return $matches[1] . strtolower($matches[2]);
            },
            $s
        );

        // Complex case for A as main letter
        $s = preg_replace_callback(
            '/(^|[^BCDGHJKLMNPR\'STVYZhdtn])A\'([AEOUI])/',
            function($matches) {
                return $matches[1] . strtolower($matches[2]);
            },
            $s
        );

        // Handle vowels after A
        $s = preg_replace('/A([AEIOUaeiou])/', '$1', $s);
        $s = str_replace('sh', 'sH', $s);

        // Normalize apostrophes
        $s = preg_replace('/[\'ʼʹ'ʾ]/', '\'', $s);

        // Swap case
        $s = strtr($s, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                      'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');

        // Final substitutions
        $s = str_replace('ee', 'ai', $s);
        $s = str_replace('oo', 'au', $s);
        $s = str_replace(':', 'H', $s);

        return $this->add_plus($s);
    }

    public function EWTStoACIP($s) {
        // Normalize apostrophes
        $s = preg_replace('/[\'ʼʹ'ʾ]/', '\'', $s);
        
        // Convert (...) to /.../
        $s = preg_replace('/\(([^\/]*)\)/', '/\1/', $s);
        
        // Simple substitutions
        $s = str_replace('|', ';', $s);
        $s = preg_replace('/(^|\[)\*/', '$1', $s);
        $s = str_replace('@##', 'ZZ', $s);
        $s = str_replace('@#', '*', $s);
        $s = preg_replace('/(^|\[)#/', '$1', $s);
        $s = str_replace('ZZ', '#', $s);
        $s = str_replace('?', '\\', $s);
        $s = preg_replace('/\\U0F38/i', '^', $s);
        $s = str_replace('/', ',', $s);
        $s = str_replace('!', '`', $s);
        $s = str_replace('w', 'v', $s);
        
        // Handle TSH/TS cases
        $s = str_replace('tsh', 'ZZZ', $s);
        $s = str_replace('ts', 'tz', $s);
        $s = str_replace('ZZZ', 'ts', $s);
        
        // More substitutions
        $s = str_replace('~X', '%', $s);
        $s = str_replace('H', ':', $s);
        
        // Swap case
        $s = strtr($s, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                      'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        
        // Handle special cases
        $s = str_replace('-I', 'w', $s);
        $s = str_replace('-i', 'q', $s);
        $s = str_replace('.', '-', $s);
        $s = str_replace('AI', 'EE', $s);
        $s = str_replace('AU', 'OO', $s);
        
        // Add A for ཨ
        $s = preg_replace('/(^|[^BCDGHJKLMNPR\'STVYZhdtnEO])([AEOUIqaewiou])/', '$1A$2', $s);
        
        // Handle vowels
        $s = str_replace('a', '\'A', $s);
        $s = str_replace('u', '\'U', $s);
        $s = str_replace('o', '\'O', $s);
        $s = str_replace('e', '\'E', $s);
        $s = str_replace('i', '\'I', $s);
        $s = str_replace('q', '\'i', $s);
        $s = str_replace('w', 'i', $s);
        $s = str_replace('x', 'o', $s);
        $s = str_replace('sH', 'sh', $s);
        
        return $s;
    }

    private function add_plus($src) {
        return preg_replace_callback(
            '/([bcdgjklm\'nprstwyzhSDTN]+)([aeiouAEIOU.-])/',
            function($matches) {
                return $this->add_plus_to_consonants($matches[1]) . $matches[2];
            },
            $src
        );
    }

    private function add_plus_to_consonants($c) {
        // Check if it matches standard Tibetan pattern
        if (preg_match('/^([bcdgjklm\'npstzhSDTN]|bgl|dm|sm|sn|kl|dk|bk|bkl|rk|lk|sk|brk|bsk|kh|mkh|\'kh|gl|dg|bg|mg|\'g|rg|lg|sg|brg|bsg|ng|dng|mng|rng|lng|sng|brng|bsng|gc|bc|lc|ch|mch|\'ch|mj|\'j|rj|lj|brj|ny|gny|mny|rny|sny|brny|bsny|gt|bt|rt|lt|st|brt|blt|bst|th|mth|\'th|gd|bd|md|\'d|rd|ld|sd|brd|bld|bsd|gn|mn|rn|brn|bsn|dp|lp|sp|ph|\'ph|bl|db|\'b|rb|lb|sb|rm|ts|gts|bts|rts|sts|brts|bsts|tsh|mtsh|\'tsh|dz|mdz|\'dz|rdz|brdz|zh|gzh|bzh|zl|gz|bz|bzl|rl|brl|sh|gsh|bsh|sl|gs|bs|bsl|lh)[rwy]*$/', $c)) {
            return $c;
        }

        // Split into consonant tokens
        preg_match_all('/zh|ny|dz|ts|tsh|ch|ph|th|sh|Sh|kh|ng|[NDTRYWbcdghjklmnprstwyz\']/', $c, $matches);
        $c_tokens = $matches[0];

        if (count($c_tokens) == 1) {
            return $c;
        }

        // Check if first two tokens are in prefix list
        $first_two = array_slice($c_tokens, 0, 2);
        if (in_array(implode('', $first_two), $this->STD_TIB_STACKS_PREFIX)) {
            return $c_tokens[0] . '+' . implode('+', array_slice($c_tokens, 1));
        }

        return implode('+', $c_tokens);
    }

    public function test_assert($orig, $expected, $aciptoewts = true) {
        $res = $aciptoewts ? $this->ACIPtoEWTS($orig) : $this->EWTStoACIP($orig);
        if ($res !== $expected) {
            echo "error: $orig => $res but $expected expected\n";
        }
    }

    public function runTests() {
        // ACIP to EWTS tests
        $this->test_assert("KA(BA)CA()BA[ABC]BA@001A BA", "kabacabababa");
        $this->test_assert("KA/BA/CA//DA/", "ka(ba)ca()da");
        $this->test_assert("A'I", "I");
        $this->test_assert("^", "\\u0f38");
        $this->test_assert("Ai", "-i");
        $this->test_assert("A'i", "-I");
        $this->test_assert("B'I", "bI");
        $this->test_assert("'I 'OD", "'i 'od");
        $this->test_assert("BA'I", "ba'i");
        $this->test_assert("AI", "i");
        $this->test_assert("A'U", "U");
        // Add more tests as needed...

        // EWTS to ACIP tests
        $this->test_assert("I", "A'I", false);
        $this->test_assert("\\u0f38", "^", false);
        $this->test_assert("-i", "Ai", false);
        $this->test_assert("-I", "A'i", false);
        $this->test_assert("bI", "B'I", false);
        $this->test_assert("'i 'od", "'I 'OD", false);
        $this->test_assert("ba'i", "BA'I", false);
        // Add more tests as needed...
    }
}

// Usage example:
$converter = new TibetanConverter();
$acip = "KA(BA)CA()BA[ABC]BA@001A BA";
$ewts = $converter->ACIPtoEWTS($acip);
echo $ewts;  // outputs: kabacabababa

?>