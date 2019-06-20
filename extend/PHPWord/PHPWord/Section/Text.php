<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
// | yershop网店管理系统
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.yershop.com All rights reserved.
// +----------------------------------------------------------------------
// | 版权申明：yershop网店管理系统不是一个自由软件，是贝云网络官方推出的商业源码，严禁在未经许可的情况下
// | 拷贝、复制、传播、使用yershop网店管理系统的任意代码，如有违反，请立即删除，否则您将面临承担相应
// | 法律责任的风险。如果需要取得官方授权，请联系官方http://www.yershop.com
// +----------------------------------------------------------------------
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */


/**
 * PHPWord_Section_Text
 *
 * @category   PHPWord
 * @package    PHPWord_Section
 * @copyright  Copyright (c) 2011 PHPWord
 */
class PHPWord_Section_Text {
	
	/**
	 * Text content
	 * 
	 * @var string
	 */
	private $_text;
	
	/**
	 * Text style
	 * 
	 * @var PHPWord_Style_Font
	 */
	private $_styleFont;
	
	/**
	 * Paragraph style
	 * 
	 * @var PHPWord_Style_Font
	 */
	private $_styleParagraph;
	
	
	/**
	 * Create a new Text Element
	 * 
	 * @var string $text
	 * @var mixed $style
	 */
	public function __construct($text = null, $styleFont = null, $styleParagraph = null) {
		// Set font style
		if(is_array($styleFont)) {
			$this->_styleFont = new PHPWord_Style_Font('text');
			
			foreach($styleFont as $key => $value) {
				if(substr($key, 0, 1) != '_') {
					$key = '_'.$key;
				}
				$this->_styleFont->setStyleValue($key, $value);
			}
		} else {
			$this->_styleFont = $styleFont;
		}
		
		// Set paragraph style
		if(is_array($styleParagraph)) {
			$this->_styleParagraph = new PHPWord_Style_Paragraph();
			
			foreach($styleParagraph as $key => $value) {
				if(substr($key, 0, 1) != '_') {
					$key = '_'.$key;
				}
				$this->_styleParagraph->setStyleValue($key, $value);
			}
		} else {
			$this->_styleParagraph = $styleParagraph;
		}
		
		$this->_text = $text;
		
		return $this;
	}
	
	/**
	 * Get Text style
	 * 
	 * @return PHPWord_Style_Font
	 */
	public function getFontStyle() {
		return $this->_styleFont;
	}
	
	/**
	 * Get Paragraph style
	 * 
	 * @return PHPWord_Style_Paragraph
	 */
	public function getParagraphStyle() {
		return $this->_styleParagraph;
	}
	
	/**
	 * Get Text content
	 * 
	 * @return string
	 */
	public function getText() {
		return $this->_text;
	}
}
?>