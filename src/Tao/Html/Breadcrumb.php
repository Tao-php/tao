<?php
namespace Tao\Html;

class Breadcrumb
{
	protected $aStack = [];

	protected $iNumItems = 0;

	public function add($label, $url = null, $bPrepend = false)
	{
		$aData = [
			'label'  => $label,
			'url'    => $url
		];

		if ($bPrepend) {
			array_unshift($this->aStack, $aData);
		}
		else {
			$this->aStack[] = $aData;
		}

		++$this->iNumItems;
	}

	public function getNumItems()
	{
		return $this->iNumItems;
	}

	public function getAll()
	{
		foreach ($this->aStack as $k => $v)
		{
			$this->aStack[$k]['isFirst'] = ($k == 0);
			$this->aStack[$k]['isLast'] = ($k == $this->iNumItems - 1);
		}

		return $this->aStack;
	}

	public function getCurrent()
	{
		return isset($this->aStack[$this->iNumItems]) ? $this->aStack[$this->iNumItems] : null;
	}

	public function getPrevious()
	{
		return isset($this->aStack[$this->iNumItems - 1]) ? $this->aStack[$this->iNumItems - 1] : null;
	}

	public function getNext()
	{
		return isset($this->aStack[$this->iNumItems + 1]) ? $this->aStack[$this->iNumItems + 1] : null;
	}
}
