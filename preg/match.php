<?php
//echo preg_match('/ph+p/','aspphpjsp'); //+ ：表示至少有一个前导字符（有一个或者多个前导字符）
//echo preg_match('/ph*p/','aspphpjsp'); //* ：表示有0个、1个或者多个前导字符
//echo preg_match('/ph?p/','asphhphpjsp'); //? ：表示有0个或者1个前导字符
//echo preg_match('/ph.p/','phap'); //. ：匹配任意字符
//echo preg_match('/ph.*p/','phadsfp'); //. 和 * 配合使用，表示任意字符串
//echo preg_match('/ph{2}p/','phhp'); //{x} 表示有x个前导字符
//echo preg_match('/ph{2,4}p/','phhhhp'); //{x,y} 表示有x到y个前导字符
//echo preg_match('/ph{2,}p/','phhhhhhhhp'); //{x,} 表示至少有x个前导字符
//echo preg_match('/^php/','phpabcabc'); //^ 表示从字符串的开头匹配
//echo preg_match('/php$/','abcabcphp'); //$ 表示从字符串的结尾匹配
//echo preg_match('/asp|php|jsp/','abcphpabcjava'); //| 表示或者的意思
//echo preg_match('/[a-z]/','aAASDJFLSD'); //[a-z] 表示只有有一个小写字母就匹配
//echo preg_match('/[A-Z]/','aAASDJFLSD'); //[A-Z] 表示只有有一个大写字母就匹配
//echo preg_match('/[0-9]/','aAASDJF4LSD'); //[0-9] 表示只有有一个数字就匹配
//echo preg_match('/[2-5]/','aAASDJF6LSD'); //[2-5] 表示只有有2~5之前的一个数字就匹配
//echo preg_match('/[abhj]/','cAASDJF6LSD'); //[abhj] 表示字符串中只要有abhj中的任意一个就算匹配
//echo preg_match('/[^abhj]/','aabjhjhba'); //[^abhj] 表示字符串中只要有不含abhj的字符出现，就表示匹配
//echo preg_match('/\w/',' （#&……');      //[\w] 表示匹配任意的字母数字和下划线
//echo preg_match('/\W/',' （#&……');      //[\W] 只要字符串中不出现数字字母下划线，就算匹配
//echo preg_match('/\d/',' （#&8……');     //[\d] 匹配数字，只要有数字出现，就算匹配
//echo preg_match('/\D/','723897239e');  //[\D] 只要有非数字出现，就算匹配
//echo preg_match('/\s/','723897 239e'); //[\s] 只要有空白就匹配
//echo preg_match('/\S/','   ');         //[\S] 只要没有空白就匹配
//echo preg_match('/\bt/','this');       //[\b] 匹配是否到达了单词边界  匹配单词前面的边界，\b放在前面；匹配单词后面的边界，\b放在后面
//echo preg_match('/\bth/','this');      //[\b] 匹配是否到达了单词边界  匹配单词前面的边界，\b放在前面；匹配单词后面的边界，\b放在后面
//echo preg_match('/s\b/','this');       //[\b] 匹配是否到达了单词边界  匹配单词前面的边界，\b放在前面；匹配单词后面的边界，\b放在后面
//echo preg_match('/s\B/','this');       //[\B] 匹配是否到达了单词边界，是边界不匹配，不是边界匹配。和\b是相反的。
//echo preg_match('/\*/','this*is');       //[\b] \是转义的意思。匹配字符串中是否有*，因为*是正则表达式语法的一种，所以加\进行转义

//修饰符
/*
 *
 * 修饰符放在正则表达式的/的后面，比如下面的i，表示不区分大小写
 * '/php/i'
 *
 */
//echo preg_match('/h/i','I Have A Pen'); // i 表示不区分大小写
//echo preg_match('/pen$/im',"I Have A Pen\nI Have A Apple"); // m 表示多行识别匹配
//（比如字符串中有\n表示换行。正则表达式是在字符串末尾找pen，加上修饰符m后，以\n为换行，每行结尾处都找pen）
//echo preg_match(); // U 禁止贪婪匹配，例子略
?>