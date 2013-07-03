<?php
class BootstrapShell extends AppShell {
	public function main() {
		$this->out('options [copy|build]');
	}

	public function copy() {
		$this->out("<info>Starting copy...</info>\n");
		$vendor_path = $this->getBootstrapPath();
		$css_dir = $vendor_path . 'bootunstrap' . DS . 'css/';
		$js_dir = $vendor_path . 'bootunstrap' . DS . 'js/';
		$this->out("copying css: \n" . $css_dir . "\nto\n" . CSS);
		$this->out(shell_exec("cp -R " . $css_dir . " " . CSS));
		$this->out("copying js: \n" . $js_dir . "\nto\n" . JS);
		$this->out(shell_exec("cp -R " . $js_dir . " " . JS));
		$this->out("<info>Copy done.</info>\n");
	}

	public function build() {
		$this->out("<info>Starting build...</info>\n");
		$vendor_path = $this->getBootstrapPath();
		$bun = $vendor_path . 'bootunstrap';
		$this->out(shell_exec("cd " . $bun . " && ./build.sh bootstrap\n"));
		$this->out("<info>Build done.</info>\n");
	}

	private function getBootstrapPath() {
		$vendor_dirs = App::path('Vendor');
		if (count($vendor_dirs) > 1) {
			foreach ($vendor_dirs as $key => $value) {
				if (strpos($value, 'Bootstrap/Vendor') > 1) {
					return $value;
				}
			}
		}
		return null;
	}
}