<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category Zend
 * @package mail_bank_Zend_Mail
 * @subpackage Storage
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd	  New BSD License
 * @version $Id$
 */
/**
 * @category Zend
 * @package mail_bank_Zend_Mail
 * @subpackage Storage
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd	  New BSD License
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
interface mail_bank_Zend_Mail_Part_Interface extends RecursiveIterator {
   /**
    * Check if part is a multipart message
    *
    * @return bool if part is multipart
    */
   public function isMultipart();
   /**
    * Body of part
    *
    * If part is multipart the raw content of this part with all sub parts is returned
    *
    * @return string body
    * @throws mail_bank_Zend_Mail_Exception
    */
   public function getContent();
   /**
    * Return size of part
    *
    * @return int size
    */
   public function getSize();
   /**
    * Get part of multipart message
    *
    * @param  int $num number of part starting with 1 for first part
    * @return mail_bank_Zend_Mail_Part wanted part
    * @throws mail_bank_Zend_Mail_Exception
    */
   public function getPart($num);
   /**
    * Count parts of a multipart part
    *
    * @return int number of sub-parts
    */
   public function countParts();
   /**
    * Get all headers
    *
    * The returned headers are as saved internally. All names are lowercased. The value is a string or an array
    * if a header with the same name occurs more than once.
    *
    * @return array headers as array(name => value)
    */
   public function getHeaders();
   /**
    * Get a header in specificed format
    *
    * Internally headers that occur more than once are saved as array, all other as string. If $format
    * is set to string implode is used to concat the values (with mail_bank_Zend_Mime::LINEEND as delim).
    *
    * @param  string $name	name of header, matches case-insensitive, but camel-case is replaced with dashes
    * @param  string $format change type of return value to 'string' or 'array'
    * @return string|array value of header in wanted or internal format
    * @throws mail_bank_Zend_Mail_Exception
    */
   public function getHeader($name, $format = null);
   /**
    * Get a specific field from a header like content type or all fields as array
    *
    * If the header occurs more than once, only the value from the first header
    * is returned.
    *
    * Throws a mail_bank_Zend_Mail_Exception if the requested header does not exist. If
    * the specific header field does not exist, returns null.
    *
    * @param  string $name		 name of header, like in getHeader()
    * @param  string $wantedPart the wanted part, default is first, if null an array with all parts is returned
    * @param  string $firstName  key name for the first part
    * @return string|array wanted part or all parts as array($firstName => firstPart, partname => value)
    * @throws mail_bank_Zend_Exception, mail_bank_Zend_Mail_Exception
    */
   public function getHeaderField($name, $wantedPart = 0, $firstName = 0);
   /**
    * Getter for mail headers - name is matched in lowercase
    *
    * This getter is short for mail_bank_Zend_Mail_Part::getHeader($name, 'string')
    *
    * @see mail_bank_Zend_Mail_Part::getHeader()
    *
    * @param  string $name header name
    * @return string value of header
    * @throws mail_bank_Zend_Mail_Exception
    */
   public function __get($name);
   /**
    * magic method to get content of part
    *
    * @return string content
    */
   public function __toString();
}