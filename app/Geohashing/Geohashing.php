<?php

namespace App\Geohashing;

use App\Geohashing\GeohashingCoordinate;

class Geohashing
{
	/**
	 * Calculates coordinates for a string.
	 *
	 * @param String
	 *
	 * @return GeohashingCoordinate
	 */
	public static function calculateCoordinateOffsetsForString(String $sourceString)
	{
		// Sanitize the source string
		// And hash it
		$hash = md5(trim($sourceString));

		// Split
		$latHash = substr($hash, 0, 15);
		$lonHash = substr($hash, 16, 15);

		// Convert to decimal
		//$divisor = pow(16,15);
		$divisor = 1152921504606846976;
		$lat = hexdec($latHash) / $divisor;
		$lon = hexdec($lonHash) / $divisor;

		// Create object and return it. 
		$coord = new GeohashingCoordinate;
		$coord->latitude = floatval($lat);
		$coord->longitude = $lon;
		$coord->debugInfo = [
			"input" => $sourceString, 
			"hashString" => $hash, 
			"latitudeHash" => $latHash, 
			"longitudeHash" => $lonHash,
			"divisor" => $divisor,
			];

		return $coord;
	}
}